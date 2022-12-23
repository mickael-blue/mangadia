<?php

namespace App\Http\Controllers;

use App\Models\Battle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BattleUpdateRequest;

class BattleController extends Controller
{
    //
    public function vote(BattleUpdateRequest $request)
    {
        $request->update($request->validated());
        return Redirect::route('/');

    }

}
