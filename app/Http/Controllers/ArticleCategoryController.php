<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCategoryPostRequest;
use App\Http\Requests\ArticleCategoryUpdateRequest;
use App\Http\Resources\ArticleCategoryResource;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{

    public function index()
    {
        return response(ArticleCategoryResource::collection(ArticleCategory::all()));
    }

    public function store(ArticleCategoryPostRequest $request)
    {
        $article_category = new ArticleCategory();
        $article_category->category = $request->category;
        $article_category->save();
        return response([
            'article_category'  => new ArticleCategoryResource($article_category)
        ], 201);
    }

    public function show($id)
    {
        $article_category = ArticleCategory::find($id);
        if ($article_category == null) {
            return response([
                'message'   => 'Article category not found'
            ], 404);
        }
        return response([
            'article_category' => new ArticleCategoryResource($article_category)
        ], 200);
    }

    public function update($id, ArticleCategoryUpdateRequest $request)
    {
        $article_category = ArticleCategory::find($id);
        if ($article_category == null) {
            return response([
                'message'   => 'Article category not found'
            ], 404);
        }
        $article_category->category = $request->category;
        $article_category->save();
        return response([
            'article_category' => new ArticleCategoryResource($article_category)
        ], 200);
    }

    public function destroy($id)
    {
        $article_category = ArticleCategory::find($id);
        if ($article_category == null) {
            return response([
                'message'   => 'Article category not found'
            ], 404);
        }
        $article_category->delete();
        return response([
            'article_category_deleted'  => new ArticleCategoryResource($article_category),
            'message'   => 'Article category deleted'
        ], 200);

    }
}
