<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $projects = Project::with('tecnologies', 'type')->get();
        // $projects = Project::paginate(20);

        return response()->json($projects);
    }
}
