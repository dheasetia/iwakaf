<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectDetailResource;
use App\Models\Project;
use Illuminate\Http\Request;

class BladePageController extends Controller
{
    public function home()
    {
        $projects = ProjectDetailResource::collection(Project::all());
        return view('home', compact('projects'));
    }


}
