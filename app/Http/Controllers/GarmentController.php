<?php

namespace App\Http\Controllers;

use App\Models\Garment;
use Illuminate\Http\Request;

class GarmentController extends Controller
{
    public function index(Request $request)
    {
        $garments = Garment::with('photos')->get();
        $deleteMode = $request->query('mode') === 'delete';
        $editMode = $request->query('mode') === 'edit';

        return view('garments', compact('garments', 'deleteMode', 'editMode'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(Garment $garment) {}
    public function edit(Garment $garment) {}
    public function update(Request $request, Garment $garment) {}
    public function destroy(Garment $garment) {}
}
