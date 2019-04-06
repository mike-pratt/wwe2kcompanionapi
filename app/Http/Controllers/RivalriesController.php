<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RESTActions;
use App\Models\v0\Rivalry;
use App\Models\v0\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RivalriesController extends Controller implements RESTActions
{
    public function getAll()
    {
        $rivalries = Rivalry::all();
        return response()->json($rivalries);
    }

    public function getById($id)
    {
        $rivalry = Rivalry::find($id);
        if ($rivalry != null) {
            return response()->json($rivalry);
        } else {
            return response()->json('Rivalry not found', Response::HTTP_NOT_FOUND);
        }
    }

    public function create(Request $request) // TODO: Check wrestler_id and rival_id are not the same, and that the inverse does not already exist.
    {
        $this->validate($request, Show::$rules);
        $rivalry = Rivalry::create($request->all());
        $rivalry->save();
        return response()->json($rivalry, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Show::$rules);
        $rivalry = Show::find($id);
        $rivalry->level = $request->input('level');
        $rivalry->length = $request->input('length');
        $rivalry->active = $request->input('active');
        return response()->json($rivalry, Response::HTTP_ACCEPTED);
    }

    public function renew($id) // TODO: Untested
    {
        $rivalry = Rivalry::find($id);
        if ($rivalry->active == 0) {
            // renew by setting active to 1 and changing length and level if necessary
        }
    }

    public function delete($id)
    {
        $show = Show::find($id);
        $show->delete();
        return response()->json('deleted', Response::HTTP_ACCEPTED);
    }

}
