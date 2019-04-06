<?php

namespace App\Models\v0;


class Wrestler extends BaseModel
{
    protected $fillable = [
        'name',
        'height',
        'weight',
        'hometown',
        'show_id',
    ];

    protected $casts = [
        'show_id' => 'unsignedInteger'
    ];

    public static $rules = [
        'name' => 'required|string|max:128',
        'height' => 'required|string',
        'weight' => 'required|integer|max:599|min:99',
        'show_id' => 'integer' // required
    ];

    // probably need special rules for height, such as measuring unit (metric, imperial), + conversions.

    // Relationships

    public function show()
    {
        return $this->belongsTo('App\Models\v0\Show');
    }

    public function championship()
    {
        return $this->hasMany('App\Models\v0\Championship');
    }

//    public function championshipReign() many to many fetches the championships and the pivot table, I want a list of reigns.
//    {
////        return $this->belongsToMany('App\Models\v0\ChampionshipReign', 'championship_reigns', 'wrestler_id', 'championship_id');
//        return $this->belongsToMany('App\Models\v0\Championship', 'championship_reigns', 'wrestler_id', 'championship_id');
//    }

    public function championshipReign()
    {
        return $this->belongsTo('App\Models\v0\ChampionshipReign');
    }


    public function rivalry()
    {
        // return $this->belongsToMany('App\Models\v0\Wrestler', 'rivalries', 'wrestler_id', 'rival_id');
        return $this->belongsTo('App\Models\v0\Rivalry');
    }



}
