<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('home', ['projects' => $projects]);
    }
}
