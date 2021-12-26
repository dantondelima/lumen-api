<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;


class ArtistasController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Artista::all(), 200);
    }

    public function show($id)
    {
        $artista = Artista::find($id);

        if(is_null($artista)){
            return response()->json('', 404);
        }

        return response()->json($artista, 200);
    }

    public function store(Request $request){

    }
}
