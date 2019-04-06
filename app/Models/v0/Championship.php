<?php

namespace App\Models\v0;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    protected $fillable = [
      'name',
      'show_id',
      'level',
      'wrestler_id'
    ];

    public static $rules = [
        'name' => 'required|string|max:128',
        'level' => 'required|string|max:128',
        'show_id' => 'integer',
        'wrestler_id' => 'integer'
    ];


    public function shows()
    {
        return $this->belongsToMany('App\Models\v0\Show');
    }

    public function wrestler()
    {
        return $this->belongsTo('App\Models\v0\Wrestler');
    }

//    public function championshipReign() // many to many pivot table -> not what I want for this.
//    {
//        // return $this->belongsToMany('App\Models\v0\ChampionshipReign', 'championship_reigns', 'championship_id', 'wrestler_id');
//        return $this->belongsToMany('App\Models\v0\Wrestler', 'championship_reigns', 'wrestler_id', 'championship_id');
//
//    }

    public function championshipReign()
    {
        return $this->belongsTo('App\Models\v0\ChampionshipReign');
    }

}
