<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Services\CommentService;
use App\Services\PostService;

class CommentController extends Controller
{
    //
    public function store(CommentCreateRequest $request, string $postUUID)
    {
        $comment = $request->validated('comment');
        $post = PostService::getPost($postUUID, fields: ['id']);
        if (!$post) {
            abort(404);
        }
        CommentService::createComment($comment, $post->id, auth()->user()->id);
        return back();
    }

    public function update(CommentUpdateRequest $request, string $commentUUID)
    {
        $comment = $request->validated('comment');
        CommentService::updateComment($comment, $commentUUID);
        return back();
    }

    public function delete(string $commentUUID)
    {
        CommentService::deleteComment($commentUUID);
        return back();
    }
}
