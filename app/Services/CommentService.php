<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public static function getComments(string $postId, ?array $fields = ['*'], ?array $with = [])
    {
        return Comment::with($with)->where('post_id', $postId)->select($fields)->get();
    }

    public static function getComment(string $commentUUID,
        ?array $fields = ['*'],
        ?array $with = []) {
        return Comment::with($with)->where('uuid', $commentUUID)->select($fields)->first();
    }

    public static function createComment(string $content, string $postId, string $userId)
    {
        return Comment::create([
            'content' => $content,
            'post_id' => $postId,
            'user_id' => $userId,
            'uuid' => str()->uuid()->toString(),
        ]);
    }

    public static function updateComment(string $content, string $commentUUID): bool
    {
        return Comment::where('uuid', $commentUUID)->update([
            'content' => $content,
        ]);
    }

    public static function deleteComment(string $commentUUID)
    {
        return Comment::where('uuid', $commentUUID)->delete();
    }
}
