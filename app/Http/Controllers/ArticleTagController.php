<?php

namespace App\Http\Controllers;

use App\Models\ArticleTag;
use Illuminate\Http\Request;

class ArticleTagController extends Controller
{
    public function index()
    {

        return response([
            '' => ''
        ]);
    }

    public function show($id)
    {
        $model = ArticleTag::find($id);
        if ($model == null) {
            return response([
                'message' => 'Model not found'
            ], 404);
        }
        return response([
            '' => ''
        ]);
    }

    public function update($id, Request $request)
    {
        $model = ArticleTag::find($id);
        if ($model == null) {
            return response([
                'message' => 'Model not found'
            ], 404);
        }

        return response([
            '' => ''
        ]);
    }

    public function store(Request $request)
    {
        return response([
            '' => ''
        ]);
    }

    public function destroy($id)
    {
        $model = ArticleTag::find($id);
        if ($model == null) {
            return response([
                'message' => 'Model not found'
            ], 404);
        }
        return response([
            '' => ''
        ]);
    }
}
