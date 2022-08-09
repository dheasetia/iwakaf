<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectResource::collection(Project::all());
        return response([
            'projects' => $projects
        ], 200);
    }

    public function show($id)
    {
        $project =  new ProjectResource(Project::findOrFail($id));
        return response([
            'project'   => $project
        ], 200);
    }


}
