<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class FeedController extends Controller
{
    public function index()
    {
        $posts = PostService::getPosts(withCount: [
            'comments',
        ]);
        return view('feed', compact('posts'));
    }

}
