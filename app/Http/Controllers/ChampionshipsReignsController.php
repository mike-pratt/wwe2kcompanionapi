<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RESTActions;
use App\Models\v0\ChampionshipReign;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChampionshipsReignsController extends Controller implements RESTActions
{
    public function getAll()
    {
        $reigns = ChampionshipReign::all();
        return response()->json($reigns);
    }

    public function getById($id)
    {
        $reign = ChampionshipReign::find($id);
        return response()->json($reign);
    }

    public function create(Request $request)
    {
        $this->validate($request, ChampionshipReign::$rules);
        $reign = ChampionshipReign::create($request->all());
        $reign->save();
        return response()->json($reign, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ChampionshipReign::$rules);
        $reign = ChampionshipReign::find($id);
        $reign->days = $request->input('days');
        return response()->json($reign, Response::HTTP_ACCEPTED);
    }

    public function delete($id)
    {
        // Don't delete reigns.
    }

}
