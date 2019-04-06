<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 20/05/2018
 * Time: 12:18
 */

namespace App\Http\Controllers\Traits;


use Illuminate\Http\Response;

trait PaginateAction
{
    public function allPaginate()
    {
        $model = self::MODEL;
        return response()->json(Response::HTTP_OK, $model::paginate(15));
    }

}