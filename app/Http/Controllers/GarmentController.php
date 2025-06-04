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

    public function show(Garment $garment)
    {
        $garment->load('photos'); 
        return view('garments.show', compact('garment'));
    }

}
