<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        return response()->json($characters, 200);
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
        $character = Character::create($request->all());

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
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return response()->json($character, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $status = false;
        $message = "Erreur lors de l'enregistrement des données";
        $character = $character->update($request->all());

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
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $status = false;
        $message = "Erreur lors de la suppression des données";

        if ($character->delete()) {
            $status = true;
            $message = "Données supprimées avec succès";
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ], 200);
    }
}
