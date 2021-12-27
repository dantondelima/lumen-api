<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Services\ArtistaService;
use Illuminate\Http\Request;


class ArtistaController extends Controller
{

    protected $service;

    public function __construct(ArtistaService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return response()->json($this->service->all(), 200);
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
        return response()->json(Artista::create($request->all()), 201);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
