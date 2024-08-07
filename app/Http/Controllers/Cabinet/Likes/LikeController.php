<?php

namespace App\Http\Controllers\Cabinet\Likes;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $posts = auth()->user()->likedPosts;

        return view('cabinet.likes.index', compact('posts'));
    }

    /**
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function unlike(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('likes.index')
            ->with('success', 'Post unliked successfully!');
    }
}
