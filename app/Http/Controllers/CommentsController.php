<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class CommentsController extends Controller
{
    /*
     * Stores a comment
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['sprint_id' => 'required', 'content' => 'required']);

        Auth::user()->comments()->create($request->all());
        return redirect()->back();
    }
}
