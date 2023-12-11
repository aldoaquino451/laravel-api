<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);

        return response()->json($projects);
    }

    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->first();

        return response()->json($project);
    }
}
