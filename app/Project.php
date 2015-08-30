<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'name',
        'duration',
        'description',
        'memo',
        'start_date',
    ];

    protected $dates = ['start_date', 'end_date'];


    public function client()
    {
        return $this->belongsTo('App\Client');
    }


    public function backlogs()
    {
        return $this->hasMany('App\Backlog');
    }


    public function getDeadlineAttribute()
    {
        $diffDays = $this->start_date->diffInDays(Carbon::now());
        $deadline = round(($diffDays / $this->duration) * 100);

        return min(100, $deadline);
    }


    public function getStartDateAttribute($date)
    {
        return Carbon::parse($date);
    }

}
