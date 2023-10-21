<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all(); 
        return response()->json([

            'success' => true,
            'results' => $technologies

        ]);
    }

    public function show($slug)
    {
        $technologies = Technology::with( 'projects')->where('slug', $slug)->first(); 

        if ($technologies) {
            return response()->json([

                'success' => true,
                'types' => $technologies

            ]);
        }
        else{
            return response()->json([

                'success' => false,
                'message' => 'Tecnologia non trovata'

            ]);
        }
    }
}