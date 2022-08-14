<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return response([
            'articles' => ArticleResource::collection($articles)
        ]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response([
                'message' => 'Article not found'
            ], 404);
        }
        return response([
            'article' => new ArticleResource($article)
        ]);
    }

    public function update($id, ArticleUpdateRequest $request)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response([
                'article' => 'Article not found'
            ], 404);
        }

        $article->update([$request->all()]);

        return response([
            'article' => new ArticleResource($article)
        ]);
    }

    public function store(ArticlePostRequest $request)
    {
        $article = new Article();

        if($request->file('picture_url')){
            $file= $request->file('picture_url');
            $filename= Str::slug($request->title, '_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/articles/pictures'), $filename);
            $article->picture_url = $filename;
        }

        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->location = $request->location;
        $article->content = $request->content;
        $article->article_category_id = $request->article_category_id;
        $article->editor_id = $request->editor_id;
        $article->save();

        return response([
            'article' => new ArticleResource($article)
        ]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response([
                'article' => 'Article comment not found'
            ], 404);
        }
        return response([
            'article_deleted' => new ArticleResource($article),
            'message' => 'deleted'
        ], 200);
    }
}
