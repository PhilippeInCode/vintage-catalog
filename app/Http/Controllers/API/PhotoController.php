<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(StorePhotoRequest $request)
    {
        $photo = Photo::create($request->validated());
        return response()->json($photo, Response::HTTP_CREATED);
    }

    public function destroy(Photo $photo)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, 'Forbidden');
        }

        $photo->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
