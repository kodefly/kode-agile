<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'sprint_id', 'content'
    ];
    /*
     * Every comment belongs to a user
     *
     * @return Response
     */
    public function user()
    {
        return $this->belongsTO('user');
    }
}
