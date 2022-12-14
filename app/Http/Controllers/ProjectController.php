<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectPostRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectDetailResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $shown_projects = Project::where('is_shown', '=', 1)->get();
        $projects = ProjectResource::collection($shown_projects);
        return response([
            'projects' => $projects
        ], 200);
    }

    public function show($id)
    {
        $project =  new ProjectResource(Project::findOrFail($id));
        return response([
            'project'   => new ProjectDetailResource($project)
        ], 200);
    }

    public function store(ProjectPostRequest $request)
    {
        $project = new Project();
        if($request->file('picture_url')){
            $file= $request->file('picture_url');
            $filename= Str::slug($request->title, '_') . '.' . $file->getClientOriginalExtension();
            $file-> move(public_path('assets/img/projects/pictures'), $filename);
            $project->picture_url = $filename;
        }
        if($request->file('featured_picture_url')){
            $file= $request->file('featured_picture_url');
            $filename= Str::slug($request->title, '_') . '.' . $file->getClientOriginalExtension();
            $file-> move(public_path('assets/img/projects/featured_pictures'), $filename);
            $project->featured_picture_url = $filename;
        }

        $project->category_id = $request->category_id;
        $project->name = $request->name;
        $project->title = $request->title;
        $project->location = $request->location;
        $project->target_amount = $request->target_amount;
        $project->days_target = $request->days_target;
        $project->date_start = Carbon::createFromFormat('d/m/Y', $request->date_start)->format('Y-m-d');
        $project->date_end = Carbon::createFromFormat('d/m/Y', $request->date_end)->format('Y-m-d');
        $project->caption = $request->caption;
        $project->first_choice_amount = $request->first_choice_amount;
        $project->second_choice_amount = $request->second_choice_amount;
        $project->third_choice_amount = $request->third_choice_amount;
        $project->fourth_choice_amount = $request->fourth_choice_amount;
        $project->maintenance_fee = $request->maintenance_fee;
        $project->is_favourite = $request->is_favourite;
        $project->save();

        return view('projects.show', compact('project'));
        /* api
        return response([
            'project'   => $project
        ], 201);
        */
    }

    public function update($id, ProjectUpdateRequest $request)
    {
        $project = Project::findOrfail($id)->update($request->all());
        return response([
            'project'   => $project
        ], 200);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id)->delete();
        return response([
            'project' => $project,
            'message'   => 'Data deleted'
        ], 202);
    }

    public function donate_now($id)
    {
        $project = Project::find($id);

        if ($project == null) return abort(404);
        return view('projects.donate_now', $project);
    }
}
