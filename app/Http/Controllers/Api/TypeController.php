<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all(); 
        return response()->json([

            'success' => true,
            'results' => $types

        ]);
    }

    public function show($slug)
    {
        $types = Type::with( 'projects')->where('slug', $slug)->first(); 

        if ($types) {
            return response()->json([

                'success' => true,
                'types' => $types

            ]);
        }
        else{
            return response()->json([

                'success' => false,
                'message' => 'Categoria non trovata'

            ]);
        }
    }
}
