<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $results = Project::with('technologies')->paginate(20);
        // $results = Project::all();

        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }

    public function show(Project $project)
    {
        $project->load('technologies');

        return response()->json([
            'project' => $project
        ]);
    }

}
