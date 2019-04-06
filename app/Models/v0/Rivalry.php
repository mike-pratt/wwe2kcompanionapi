<?php

namespace App\Models\v0;

use Illuminate\Database\Eloquent\Model;

class Rivalry extends Model
{
    protected $fillable = [
        'wrestler_id',
        'rival_id',
        'level',
        'length',
        'active'
    ];

    public static $rules = [
        'wrestler_id' => 'required',
        'rival_id' => 'required',
        'level' => 'required|integer|min:1|max:5',
        'length' => 'required|string',
        'active' => 'required|boolean'
    ];


    public function wrestler()
    {
        return $this->hasMany('App\Models\v0\Wrestler');
    }

}
