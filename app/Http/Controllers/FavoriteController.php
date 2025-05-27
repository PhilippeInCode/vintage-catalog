<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($garmentId)
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('garment_id', $garmentId)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'garment_id' => $garmentId
            ]);
        }

        return redirect()->back()->with('success', 'Acción completada.');
    }
}
