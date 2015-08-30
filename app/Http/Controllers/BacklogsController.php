<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Backlog;
use App\User;

class BacklogsController extends Controller
{
    /**
     * Saves a backlog, to be invoked via ajax
     *
     * @param  Request $request 
     * @return JSON
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'project_id' => 'required']);

        $backlog = Backlog::create($request->all());
        $backlog->load('user');
        $backlog = $backlog->toArray();

        if (is_null($backlog['user'])) {
            $backlog['user']['name'] = '';
        }

        return $backlog;
    }
}
