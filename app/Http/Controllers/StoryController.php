<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    private $project;
    private $story;
    public function __construct(Request $request)
    {

        $temp_project = Project::find($request->id);
        if ($temp_project == null) {
            return response([
                'status'    => 'Failed',
                'message'   => 'Project not found'
            ], 404);
        }
        $this->project = $temp_project;
        $this->story = $this->project->story;
    }

    public function show()
    {
        return response([
            'story' => $this->story
        ]);
    }

    public function store($id, Request $request)
    {
        // TODO: check if this has story;

        ///
        $story = $this->story;
        $story->project_id = $id;
        $story->story = $request->story;
        $story->save();
        return response([
            'story' => $story
        ], 201);

    }

    public function update($id, Request $request)
    {
        $this->story->story = $request->story;
        $this->story->save();
        return response([
            'story' => $this->story
        ], 200);
    }

    public function destroy()
    {

    }
}

