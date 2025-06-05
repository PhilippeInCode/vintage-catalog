<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarmentRequest;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;

class GarmentRequestController extends Controller
{
    public function create()
    {
        return view('user.request-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'usage_type' => 'required|string',
            'description' => 'nullable|string',
            'origin_country' => 'nullable|string',
            'used_country' => 'nullable|string',
            'production_year' => 'nullable|integer',
            'usage_year' => 'nullable|integer',
            'production_period' => 'nullable|string',
            'materials' => 'nullable|string',
            'photos.*' => 'nullable|image|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        $garmentRequest = GarmentRequest::create($validated);

        if ($request->hasFile('photos')) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key'    => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ]
            ]);

            foreach ($request->file('photos') as $photo) {
                $upload = $cloudinary->uploadApi()->upload($photo->getRealPath(), [
                    'folder' => 'VintageCatalog/Requests/' . $garmentRequest->name,
                ]);

                $garmentRequest->photos()->create([
                    'image_url' => $upload['secure_url'],
                    'public_id' => $upload['public_id'],
                ]);
            }
        }

        return redirect()->route('user.dashboard')->with('success', 'Solicitud enviada correctamente.');
    }
}
