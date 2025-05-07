<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLikeRequest;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(StoreLikeRequest $request)
    {
        $data = $request->validated();

        Like::firstOrCreate([
            'user_id'    => Auth::id(),
            'garment_id' => $data['garment_id'],
        ]);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function destroy($garmentId)
    {
        Like::where([
            'user_id'    => Auth::id(),
            'garment_id' => $garmentId,
        ])->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
