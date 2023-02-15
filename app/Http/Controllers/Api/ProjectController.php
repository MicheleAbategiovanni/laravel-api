<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {

        // Paginater = 10 elements for pages

        $projects = Project::with("technologies")->paginate(10);

        return response()->json($projects);

    }

    public function show(Project $project) {

        $project->load("technologies");

        return response()->json($project);
    }
}
