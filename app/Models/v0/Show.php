<?php

namespace App\Models\v0;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [
        'name',
        'primary_display'
    ];

    public static $rules = [
        'name' => 'required|string|max:128',
    ];

    // Relationships

    public function wrestlers()
    {
        return $this->hasMany('App\Models\v0\Wrestler');
    }

    public function championships()
    {
        return $this->hasMany('App\Models\v0\Championship');
    }
}
