<?php

namespace App\Http\Controllers\Api;

use App\Models\Manga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mangas = Manga::all();
        return response()->json($mangas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = false;
        $message = "Erreur lors de l'enregistrement des données";
        $character = Manga::create($request->all());

        if ($character) {
            $status = true;
            $message = "Enregistrement terminé avec succès";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'character' => $character
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        return response()->json($manga, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga)
    {
        $status = false;
        $message = "Erreur lors de l'enregistrement des données";
        $character = $manga->update($request->all());

        if ($character) {
            $status = true;
            $message = "Enregistrement terminé avec succès";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'character' => $character
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        $status = false;
        $message = "Erreur lors de la suppression des données";

        if ($manga->delete()) {
            $status = true;
            $message = "Données supprimées avec succès";
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ], 200);
    }
}
