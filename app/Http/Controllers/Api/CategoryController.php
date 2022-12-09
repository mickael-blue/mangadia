<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $character = Category::create($request->all());

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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $status = false;
        $message = "Erreur lors de l'enregistrement des données";
        $character = $category->update($request->all());

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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $status = false;
        $message = "Erreur lors de la suppression des données";

        if ($category->delete()) {
            $status = true;
            $message = "Données supprimées avec succès";
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ], 200);
    }
}
