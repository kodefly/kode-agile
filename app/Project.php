<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'client_id',
        'description',
        'memo',
    ];


    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
