<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
        public function index(Request $request)
        {

                $projects = Project::with("technologies")->paginate(1);


                return response()->json($projects);
        }

        public function show(Project $project)
        {

                $project->load("technologies");

                return response()->json($project);
        }
}
