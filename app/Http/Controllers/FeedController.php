<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class FeedController extends Controller
{
    public function index()
    {
        $posts = PostService::getPosts(
            withCount: [
                'comments',
            ],
            with: [
                'author',
                'author.media' => function ($query) {
                    $query->where('collection_name', 'avatar');
                },
                'media' => function ($query) {
                    $query->where('collection_name', 'posts');
                },
            ]);
        return view('feed', compact('posts'));
    }

}
