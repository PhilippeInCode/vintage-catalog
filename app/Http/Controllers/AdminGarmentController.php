<?php
namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;

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

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('garments', 'public');
            $garment->photos()->create([
                'image_url' => asset("storage/{$path}")
            ]);
        }
    }
        return redirect()->route('garments')->with('success', 'Prenda añadida correctamente.');
    }

    public function editMode(){
        $garments = Garment::with('photos')->get();
        return view('garments', [
            'garments' => $garments,
            'editMode' => true
        ]);
    }


    public function edit($id)       {
        $garment = Garment::findOrFail($id);
            return view('admin.garments.edit', compact('garment'));
    }

  public function update(Request $request, $id){
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

    public function destroySelected(Request $request){
    $ids = $request->input('garment_ids', []);

    if (!empty($ids)) {
        Garment::whereIn('id', $ids)->delete();
        return redirect()->route('garments')->with('success', 'Prendas eliminadas correctamente.');
    }

    return redirect()->route('garments')->with('error', 'No seleccionaste ninguna prenda para eliminar.');
    }


}
