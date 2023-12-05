<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public static function getPosts(
        ?int $perPage = 10,
        ?array $fields = ['*'],
        ?array $with = [],
        ?array $withCount = []) {
        // dd($with, $withCount, Post::with($with)->withCount($withCount)->select($fields)->toSql());
        return Post::select($fields)->with($with)->withCount($withCount)->paginate($perPage);
    }

    public static function getIndividualPosts(int $userId,
        ?int $perPage = 10,
        ?array $fields = ['*'], ?array $with = [], ?array $withCount = []) {
        return Post::select($fields)
            ->with($with)
            ->withCount($withCount)
            ->where('user_id', $userId)
            ->paginate($perPage);
    }

    public static function getPost(string $postUUID,
        ?array $fields = ['*', 'posts.id'],
        ?array $with = []): ?Post {
        return Post::with($with)->where('uuid', $postUUID)->select($fields)->first();
    }

    public static function createPost(string $content, string $userId)
    {
        return Post::create([
            'content' => $content,
            'user_id' => $userId,
            'uuid' => str()->uuid()->toString(),
        ]);
    }

    public static function updatePost(string $content, string $postUUID): bool
    {
        return Post::where('uuid', $postUUID)->update([
            'content' => $content,
        ]);
    }

    public static function deletePost(string $postUUID)
    {
        return Post::where('uuid', $postUUID)->delete();
    }

    public static function increaseView(string $postUUID)
    {
        return DB::table('posts')->where('uuid', '=', $postUUID)->increment('views');
    }
}
