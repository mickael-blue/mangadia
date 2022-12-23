<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Battle;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\BattleResource;

class FrontController extends Controller
{
    //
    public function home() {

        $battle = New BattleResource(Battle::first());

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'battle' => $battle,
            'siteName' => config('app.name'),
        ]);
    }
}
