<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RESTActions;
use App\Http\Controllers\Traits\PaginateAction;
use App\Models\v0\ChampionshipReign;
use App\Models\v0\Wrestler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class WrestlersController extends Controller implements RESTActions
{
    const MODEL = 'App\Models\v0\Wrestler';

    use PaginateAction;

    public function getAll()
    {
        $wrestlers = Wrestler::all();
        return response()->json($wrestlers);
    }

    public function getPaged()
    {
        $wrestlers = Wrestler::paginate(15);
        return response()->json($wrestlers);
    }

    public function getById($id)
    {
        $wrestler = Wrestler::find($id);
        return response()->json($wrestler);
    }

    public function getRivalries($id)
    {
        $rivalries = DB::table('rivalries')->where('wrestler_id', $id)->orWhere('rival_id', $id)->paginate(15);
        return response()->json($rivalries);
    }

    public function getReigns($id)
    {
        $reigns = DB::table('championship_reigns')->where('wrestler_id', $id)->paginate(15);
        return response()->json($reigns);
    }

    public function create(Request $request)
    {
        $this->validate($request, Wrestler::$rules);
        $wrestler = Wrestler::create($request->all());
        $wrestler->save();
        return response()->json($wrestler, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Wrestler::$rules);
        $wrestler = Wrestler::find($id);
        $wrestler->name = $request->input('name');
        $wrestler->hometown = $request->input('hometown');
        $wrestler->height = $request->input('height');
        $wrestler->weight = $request->input('weight');
        $wrestler->show_id = $request->input('show_id');
        $wrestler->save();
        return response()->json('changes_saved.', Response::HTTP_OK);
    }

    public function delete($id)
    {
        $wrestler = Wrestler::find($id);
        $wrestler->delete();

        return response()->json( 'wrestler_deleted', Response::HTTP_OK);
    }

}
