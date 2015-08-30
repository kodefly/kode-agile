<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    protected $fillable = ['project_id', 'user_id', 'title'];

    /**
     * A backlog belongs to a project
     *
     * @return App\Project
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * A backlog belongs to a user
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A backlog hasOne sprint
     *
     * @return App\Sprint
     */
    public function sprint()
    {
        return $this->hasOne('App\Sprint');
    }
}
