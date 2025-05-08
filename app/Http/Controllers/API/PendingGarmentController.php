<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendingGarmentRequest;
use App\Models\PendingGarment;
use App\Models\Garment;                 
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PendingGarmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(StorePendingGarmentRequest $request)
    {
        $data = $request->validated();
        $data['user_id']      = Auth::id();
        $data['status']       = 'pending';
        $data['submitted_at'] = now();

        $pending = PendingGarment::create($data);

        return response()->json($pending, Response::HTTP_CREATED);
    }

    public function approve($id)
{
    $pending = PendingGarment::findOrFail($id);
    Garment::create($pending->toArray());
    $pending->delete();
    return response()->json(null, Response::HTTP_NO_CONTENT);
}

public function reject($id)
{
    PendingGarment::findOrFail($id)->delete();
    return response()->json(null, Response::HTTP_NO_CONTENT);
}
}