<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Manga;
use App\Models\Category;
use App\Http\Resources\MangaResource;
use App\Http\Resources\MangaCollection;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\MangaStoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MangaUpdateRequest;
use App\Http\Resources\CategoryCollection;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Mangas/Index', [
            'mangas' => new MangaCollection(
                Manga::orderBy('id')
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
        $category = Category::all();
        return Inertia::render('Mangas/Create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MangaStoreRequest $request)
    {
        Manga::create($request->validated());
        return Redirect::route('manga.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        $categories = Category::all();
        return Inertia::render('Mangas/Edit', [
            'manga' => new MangaResource($manga),
            'categories' => new CategoryCollection($categories)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(MangaUpdateRequest $request, Manga $manga)
    {
        $manga->update(
            $request->validated()
        );
        return Redirect::route('manga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        $manga->delete();
        return Redirect::route('manga.index');
    }
}
