<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = ['description'];

    /**
     * A sprint belongs to a backlog
     *
     * @return App\Backlog
     */
    public function backlog()
    {
        return $this->belongsTo('App\Backlog');
    }

    /*
     * Each sprint has many comments
     *
     * @return  App\Comment
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
