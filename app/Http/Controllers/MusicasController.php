<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musicas;

class MusicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Musicas::all(); //método all faz o select na tabela
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Musicas::crteate($request->all());
        try{
            $musica = Musicas::create($request->all());
            return response()->json($musica, 201);
        }catch(\Exception $e) {
            return response()->json([
             'sucess' => false,
               'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Musicas::findOrFail($id); //pesquisar por id, se não encontrar retorna erro
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $musica = Musicas::findOrFail($id); //verifica se o registro existe
        return $musica->update($request->all()); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return Musicas::destroy($id); //deleta o registro
    }
}
