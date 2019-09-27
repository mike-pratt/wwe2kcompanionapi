<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RESTActions;
use App\Models\v0\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowsController extends Controller implements RESTActions
{
    public function getAll()
    {
        $shows = Show::all();
        return response()->json($shows);
    }

    public function getPaged()
    {
        $shows = Show::paginate(15);
        return response()->json($shows);
    }

    public function getById($id)
    {
        $show = Show::find($id);
        if ($show != null) {
            return response()->json($show);
        } else {
            return response()->json('Show not found', Response::HTTP_NOT_FOUND);
        }
    }

    public function getRoster($id)
    {
        $show = Show::find($id);
        if ($show != null) {
            $roster = $show->wrestlers;
            return response()->json($roster);
        } else {
            return response()->json('Show not found', Response::HTTP_NOT_FOUND);
        }

    }

    public function getChampionships($id)
    {
        $show = Show::find($id);
        if ($show != null) {
            $titles = $show->championships()->paginate(15);
            return response()->json($titles);
        } else {
            return response()->json('Show not found', Response::HTTP_NOT_FOUND);
        }

    }

    public function create(Request $request)
    {
        $validator = $this->validate($request, Show::$rules);
        $show = Show::create($request->all());
        $show->save();
        return response()->json($show, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Show::$rules);
        $show = Show::find($id);
        $show->name = $request->input('name');
        $show->primary_display = $request->input('primary_display');
        $show->save();
        return response()->json($show, Response::HTTP_ACCEPTED);

    }

    public function delete($id)
    {
        $show = Show::find($id);
        $show->delete();
        return response()->json('deleted', Response::HTTP_ACCEPTED);
    }

}
