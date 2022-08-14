<?php

namespace App\Http\Controllers;

use App\Http\Requests\BioPostRequest;
use App\Http\Requests\BioUpdateRequest;
use App\Http\Resources\BioResource;
use App\Models\Bio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BioController extends Controller
{
    public function index()
    {
        $bios = Bio::all();
        return response([
            'bios' => BioResource::collection($bios)
        ]);
    }

    public function show($id)
    {
        $bio = Bio::find($id);
        if ($bio == null) {
            return response([
                'message' => 'Bio not found'
            ], 404);
        }
        return response([
            'bio' => new BioResource($bio)
        ]);
    }

    public function update($id, BioUpdateRequest $request)
    {
        $bio = Bio::find($id);
        if ($bio == null) {
            return response([
                'bio' => 'Bio not found'
            ], 404);
        }

        if($request->file('avatar_url')){
            $file= $request->file('avatar_url');
            $filename= Str::slug($bio->first_name . $bio->last_name . time(), '_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/bios/pictures'), $filename);
            $bio->avatar_url = $filename;
        }


        $bio->village = $request->village;
        $bio->district = $request->district;
        $bio->city = $request->city;
        $bio->province = $request->province;
        $bio->phone_number = $request->phone_number;
        $bio->zip_code = $request->zip_code;
        $bio->save();

        return response([
            'bio' => new BioResource($bio)
        ]);
    }

    public function destroy($id)
    {
        $bio = Bio::find($id);
        if ($bio == null) {
            return response([
                'bio' => 'Bio not found'
            ], 404);
        }
        return response([
            'bio_deleted' => new BioResource($bio),
            'message' => 'deleted'
        ], 200);
    }
}
