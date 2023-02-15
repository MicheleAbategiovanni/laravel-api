<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {
        /* $page = $request->input("page");
        dd($page); */

        // $posts = Post::all();
        /* $posts = Post::where("user_id", 2)
            ->where("title", "LIKE", "%post%")
            ->get(); */

        // paginate() di default mostra 15 elementi per pagina.
        // Possiamo chiedere un numero diverso di elementi,
        // passando un int come primo argomento della funzione
        // $posts = Post::paginate(20);
        $projects = Project::with("technologies")->paginate(20);

        return response()->json($projects);

        /* return response()->json([
            "totale" => $posts->count(),
            "dati" => $posts
        ]); */
    }

    public function show(Project $project) {
        // come il with() caricare i dati di queste relazioni,
        // dopo aver eseguito la query principale
        $project->load("technologies");

        return response()->json($project);
    }
}
