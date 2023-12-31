<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show(string $username)
    {
        $username = str($username)->replace('@', '');

        $user = UserService::getUserByUsername($username);
        if (!$user) {
            abort(404);
        }
        $posts = PostService::getIndividualPosts($user->id,
            with: [
                'author',
                'author.media' => function ($query) {
                    $query->where('collection_name', 'avatar');
                },
                'media' => function ($query) {
                    $query->where('collection_name', 'posts');
                }],
            withCount: ['comments']);

        $isOwnProfile = auth()->user()?->username == $user->username;

        return view('profile.show', compact('user', 'posts', 'isOwnProfile'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->hasFile('avatar')) {
            $request->user()->getFirstMedia('avatar')?->delete();
            $request->user()->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
