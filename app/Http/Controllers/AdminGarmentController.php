<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;
use Cloudinary\Api\Search\SearchApi;
use Cloudinary\Cloudinary;
use App\Models\GarmentRequest;
use App\Models\Photo;

class AdminGarmentController extends Controller
{
    public function create()
    {
        return view('admin.garments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'usage_type' => 'required|in:military,formal,work,sport',
            'description' => 'nullable|string',
            'origin_country' => 'nullable|string',
            'used_country' => 'nullable|string',
            'production_year' => 'nullable|integer',
            'usage_year' => 'nullable|integer',
            'production_period' => 'nullable|string',
            'materials' => 'nullable|string',
            'photos.*' => 'required|image|max:2048'
        ]);

        $garment = Garment::create($validated);
        $folderName = 'VintageCatalog/Garments/' . $garment->name;

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ]
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $upload = $cloudinary->uploadApi()->upload($photo->getRealPath(), [
                    'folder' => $folderName,
                ]);

                $garment->photos()->create([
                    'image_url' => $upload['secure_url'],
                    'public_id' => $upload['public_id'],
                ]);
            }
        }

        return redirect()->route('garments')->with('success', 'Prenda añadida correctamente.');
    }


    public function editMode()
    {
        $garments = Garment::with('photos')->get();
        return view('garments', [
            'garments' => $garments,
            'editMode' => true
        ]);
    }

    public function edit($id)
    {
        $garment = Garment::findOrFail($id);
        return view('admin.garments.edit', compact('garment'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'usage_type' => 'required|in:military,formal,work,sport',
            'description' => 'nullable|string',
            'origin_country' => 'nullable|string',
            'production_year' => 'nullable|integer',
            'production_period' => 'nullable|string',
            'usage_year' => 'nullable|integer',
            'used_country' => 'nullable|string',
            'materials' => 'nullable|string',
        ]);

        $garment = Garment::findOrFail($id);
        $garment->update($validated);

        return redirect()->route('garments')->with('success', 'Prenda actualizada correctamente.');
    }

    public function deleteMode()
    {
        $garments = Garment::all();
        return view('admin.garments.delete-mode', compact('garments'));
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->input('garment_ids', []);

        if (empty($ids)) {
            return redirect()->route('garments')->with('error', 'No seleccionaste ninguna prenda para eliminar.');
        }

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ]
        ]);

        $garments = Garment::with('photos')->whereIn('id', $ids)->get();

        foreach ($garments as $garment) {
            $folderPath = 'VintageCatalog/Garments/' . $garment->name;

            try {
                $resources = (new SearchApi())
                    ->expression("folder:\"$folderPath\"")
                    ->execute();

                foreach ($resources['resources'] as $resource) {
                    $cloudinary->uploadApi()->destroy($resource['public_id']);
                }

                sleep(1);
                $cloudinary->adminApi()->deleteFolder($folderPath);
            } catch (\Exception $e) {
            }

            $garment->photos()->delete();
            $garment->delete();
        }

        return redirect()->route('garments')->with('success', 'Prendas eliminadas correctamente.');
    }

    public function acceptRequest($id)
    {
        $request = GarmentRequest::with('user', 'photos')->findOrFail($id);

        // Crear prenda
        $garment = Garment::create([
            'name' => $request->name,
            'description' => $request->description,
            'usage_type' => $request->usage_type,
            'origin_country' => $request->origin_country,
            'used_country' => $request->used_country,
            'production_year' => $request->production_year,
            'usage_year' => $request->usage_year,
            'production_period' => $request->production_period,
            'materials' => $request->materials,
        ]);

        $folderName = 'VintageCatalog/Garments/' . $garment->name;

        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ]
        ]);

        if ($request->photos && $request->photos->count()) {
            foreach ($request->photos as $photo) {
                $upload = $cloudinary->uploadApi()->upload($photo->image_url, [
                    'folder' => $folderName,
                ]);

                $garment->photos()->create([
                    'image_url' => $upload['secure_url'],
                    'public_id' => $upload['public_id'],
                ]);
            }
        }

        $request->status = 'accepted';
        $request->save();

        return redirect()->route('admin.dashboard')->with('success', 'Petición aceptada y prenda creada.');
    }

    public function rejectRequest($id)
    {
        $request = GarmentRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.dashboard')->with('success', 'Petición rechazada.');
    }
}
