<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 09/04/2018
 * Time: 16:52
 */

namespace App\Http\Controllers\Interfaces;
use Illuminate\Http\Request;

interface RESTActions
{
    public function getAll();
    public function getById($id);
    public function create(Request $request);
    public function update(Request $request, $id);
    public function delete($id);


}