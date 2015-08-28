<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProjectFormRequest;
use App\Http\Controllers\Controller;

use App\Project;
use App\Client;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
