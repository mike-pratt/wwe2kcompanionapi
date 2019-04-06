<?php

namespace App\Models\v0;

use Illuminate\Database\Eloquent\Model;

class ChampionshipReign extends Model
{
    protected $fillable = [
        'championship_id',
        'wrestler_id',
        'days'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public static $rules = [
        'championship_id' => 'required',
        'wrestler_id' => 'required',
        'days' => 'required|string'
    ];

    // Relationships
    public function wrestler()
    {
        return $this->hasOne('App\Models\v0\Wrestler');
    }

    public function championship()
    {
        return $this->hasOne('App\Models\v0\Championship');
    }
}
