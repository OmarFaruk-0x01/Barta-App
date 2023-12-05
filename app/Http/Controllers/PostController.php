<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Services\CommentService;
use App\Services\PostService;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $content = $request->validated('content');
        PostService::createPost($content, $request->user()->id);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $post = PostService::getPost($uuid, with: ['author']);
        if (!$post) {
            return abort(404);
        }
        $comments = CommentService::getComments($post->id, with: ['user']);
        return view('post.details', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {

        $post = PostService::getPost($uuid, with: ['author']);
        if (!$post) {
            return abort(404);
        }

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $uuid)
    {
        $content = $request->validated('content');
        PostService::updatePost($content, $uuid);
        return to_route('post.details', ['uuid' => $uuid]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        PostService::deletePost($uuid);
        return back();
    }
}
