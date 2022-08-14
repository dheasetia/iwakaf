<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCommentPostRequest;
use App\Http\Requests\ArticleCommentUpdateRequest;
use App\Http\Resources\ArticleCommentResource;
use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function index()
    {
        $article_comments = ArticleComment::all();
        return response([
            'article_comments' => ArticleCommentResource::collection($article_comments)
        ]);
    }

    public function show($id)
    {
        $article_comment = ArticleComment::find($id);
        if ($article_comment == null) {
            return response([
                'message' => 'Article comment not found'
            ], 404);
        }
        return response([
            'article_comment' => new ArticleCommentResource($article_comment)
        ]);
    }

    public function update($id, ArticleCommentUpdateRequest $request)
    {
        $article_comment = ArticleComment::find($id);
        if ($article_comment == null) {
            return response([
                'message' => 'Article comment not found'
            ], 404);
        }

        $article_comment->update([$request->all()]);

        return response([
            'article_comment' => new ArticleCommentResource($article_comment)
        ]);
    }

    public function store(ArticleCommentPostRequest $request)
    {
        $article_comment = new ArticleComment($request->all());

        return response([
            'article_comment' => new ArticleCommentResource($article_comment)
        ]);
    }

    public function destroy($id)
    {
        $article_comment = ArticleComment::find($id);
        if ($article_comment == null) {
            return response([
                'message' => 'Article comment not found'
            ], 404);
        }
        return response([
            'article_comment_deleted' => new ArticleCommentResource($article_comment),
            'message'   => 'deleted'
        ], 200);
    }
}
