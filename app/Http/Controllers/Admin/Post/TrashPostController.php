<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class TrashPostController extends Controller
{
    /**
     * @param int $postId
     * @return RedirectResponse
     */
    public function restore(int $postId): RedirectResponse
    {
        $post = Post::onlyTrashed()->find($postId);
        $post->restore();
        return redirect()->route('posts.index')
            ->with('success', 'Post restored successfully!');
    }

    /**
     * @param int $postId
     * @return RedirectResponse
     */
    public function forceDelete(int $postId): RedirectResponse
    {
        $post = Post::onlyTrashed()->find($postId);

        foreach([$post->likedUsers(), $post->tags()] as $relation) {
            $relation->detach();
        }
        $post->comments()->delete();

        $post->forceDelete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
