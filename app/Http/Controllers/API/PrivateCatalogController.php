<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrivateCatalogRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PrivateCatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(StorePrivateCatalogRequest $request)
    {
        $garmentId = $request->validated()['garment_id'];

        Auth::user()
            ->privateCatalog()
            ->syncWithoutDetaching($garmentId);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function destroy($garmentId)
    {
        Auth::user()
            ->privateCatalog()
            ->detach($garmentId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
