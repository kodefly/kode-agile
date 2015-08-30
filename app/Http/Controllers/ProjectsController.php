<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProjectFormRequest;
use App\Http\Controllers\Controller;

use App\Project;
use App\Client;
use App\User;

use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('role:developer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::with('client')->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::lists('name', 'id');
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProjectFormRequest $request)
    {
        Project::create($request->all());
        return redirect()->route('projects.index')
            ->with('message', 'New project created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        $clients = Client::lists('name', 'id');
        return view('projects.edit', compact('clients', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return Response
     */
    public function update(ProjectFormRequest $request, Project $project)
    {
        $project->update($request->all());
        return redirect('/projects')->with('message', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Shows backlogs associated with the given project
     *
     * @param Project $project
     * @return Response
     */
    public function backlogs(Project $project)
    {
        $project->load('backlogs');
        $developers = User::where('role', 'developer')->lists('name', 'id');
        return view('projects.backlogs', compact('project', 'developers'));
    }
}
