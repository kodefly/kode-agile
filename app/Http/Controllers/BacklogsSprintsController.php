<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Backlog;

class BacklogsSprintsController extends Controller
{

    /**
     * creates a sprint for the associated backlog
     *
     * @param  Request $request
     * @param  Backlog $backlog
     * @return Response
     */
    public function create(Request $request, Backlog $backlog)
    {
        if (! is_null($backlog->sprint)) {
            return redirect()->route('backlogs.sprints.show', [
                $backlog->id,
                $backlog->sprint->id,
            ]);
        }

        return view('backlogs_sprints.create', compact('backlog'));
    }

    /**
     * Stores a sprint for the associated backlog
     *
     * @param  Request $request
     * @param  Backlog $backlog
     * @return Response
     */
    public function store(Request $request, Backlog $backlog)
    {
        $this->validate($request, ['description' => 'required']);
        $backlog->sprint()->create($request->all());

        return redirect()->route('backlogs.sprints.show', [
            $backlog->id,
            $backlog->sprint->id,
        ]);
    }

    /*
     * Displays details of a sprint and its comments
     *
     * @param  Request $request
     * @param  Backlog $backlog
     * @return Response
     */
    public function show(Request $request, Backlog $backlog, $sprint)
    {
        $backlog->load('sprint.comments');
        return view('backlogs_sprints.show', compact('backlog'));
    }

}
