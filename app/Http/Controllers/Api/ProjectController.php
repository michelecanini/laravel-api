<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //$projects = Project::all();
        //$projects = Project::with('type', 'technologies')->get();
        $projects = Project::with('type', 'technologies')->paginate(3);
        return response()->json([

            'success' => true,
            'results' => $projects

        ]);
    }

    public function show($slug)
    {
        
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if($project){

            return response()->json([

                'success' => true,
                'results' => $project
    
            ]);
        }
        else{

            return response()->json([

                'success' => false,
                'error' => 'Non è stato trovato alcun Progetto.'
    
            ]);
        }
    }
}