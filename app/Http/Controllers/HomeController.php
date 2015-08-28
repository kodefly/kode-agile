<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('home.index', compact('projects'));
    }
}
