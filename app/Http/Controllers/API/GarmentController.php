<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;             
use Illuminate\Support\Facades\Auth;            
use Symfony\Component\HttpFoundation\Response;  
use App\Http\Requests\StoreGarmentRequest;
use App\Http\Requests\UpdateGarmentRequest;
use App\Models\Garment;

class GarmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
         ->except(['index', 'show']);
    }

    public function index()
    {
        return response()->json(
            Garment::with('photos')->paginate(15),
            Response::HTTP_OK
        );
    }

    public function show(Garment $garment)
    {
        return response()->json(
            $garment->load('photos','likes'),
            Response::HTTP_OK
        );
    }

    public function store(StoreGarmentRequest $request)
    {
        $this->authorizeAction();
        $garment = Garment::create($request->validated());
        return response()->json($garment, Response::HTTP_CREATED);
    }

    public function update(UpdateGarmentRequest $request, Garment $garment)
    {
        $this->authorizeAction();
        $garment->update($request->validated());
        return response()->json($garment, Response::HTTP_OK);
    }

    public function destroy(Garment $garment)
    {
        $this->authorizeAction();
        $garment->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    protected function authorizeAction()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }
    }
}
