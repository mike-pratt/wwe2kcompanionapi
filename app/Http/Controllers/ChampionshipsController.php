<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RESTActions;
use App\Models\v0\Championship;
use App\Models\v0\Wrestler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChampionshipsController extends Controller implements RESTActions
{
    public function getAll()
    {
        $championships = Championship::all();
        return response()->json($championships);
    }

    public function getPaged()
    {
        $championships = Championship::paginate(15);
        return response()->json($championships);
    }

    public function getById($id)
    {
        $championship = Championship::find($id);
        return response()->json($championship);
    }

    public function create(Request $request)
    {
        $this->validate($request, Championship::$rules);
        $championship = Championship::create($request->all());
        $championship->save();
        return response()->json($championship, Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Championship::$rules);
        $championship = Championship::find($id);
        $championship->name = $request->input('name');
        $championship->level = $request->input('level');
        $championship->champion_id = $request->input('champion_id');
        $championship->save();

        return response()->json($championship, Response::HTTP_ACCEPTED);
    }

    public function delete($id)
    {
        $championship = Championship::find($id);
        $championship->delete();
        return response()->json('deleted');
    }

    public function getChampion($id)
    {
        $championship = Championship::find($id);
        if ($championship == null)
        {
            return response()->json('Championship not found', Response::HTTP_NOT_FOUND);
        }

        $wrestler = Wrestler::find($championship->wrestler_id);

        if ($wrestler != null) {
            return response()->json($wrestler);
        } else {
            return response()->json('Wrestler not found', Response::HTTP_NOT_FOUND);
        }
    }

    public function getShows($id)
    {
        $championship = Championship::find($id);
        if ($championship == null)
        {
            return response()->json('Championship not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($championship->shows()->paginate(15), Response::HTTP_OK);
    }


}
