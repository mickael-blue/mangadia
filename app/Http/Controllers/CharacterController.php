<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Manga;
use App\Models\Character;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharacterCollection;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CharacterStoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CharacterUpdateRequest;
use App\Http\Resources\MangaCollection;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Characters/Index', [
            'characters' => new CharacterCollection(
                Character::orderBy('id')
                    ->paginate()
                    ->appends(Request::all())
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mangas = Manga::all();
        return Inertia::render('Characters/Create', [
            'mangas' => new MangaCollection($mangas),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacterStoreRequest $request)
    {
        Character::create($request->validated());
        return Redirect::route('character.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $mangas = Manga::all();
        return Inertia::render('Characters/Edit', [
            'character' => new CharacterResource($character),
            'mangas' => new MangaCollection($mangas),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterUpdateRequest $request, Character $character)
    {
        $character->update($request->validated());
        return Redirect::route('character.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return Redirect::route('character.index');
    }
}
