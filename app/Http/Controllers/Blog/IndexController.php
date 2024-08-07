<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @param int|null $categoryId
     * @return Factory|View|Application
     */
    public function index(int $categoryId = null): Factory|View|Application
  {
      $query = Post::with('category');

      $randomPosts = $query->get()->random(3);

      $categoryTitle = null;
      if ($categoryId) {
          $query->where('category_id', $categoryId);
          $categoryTitle = Category::find($categoryId)->title;
      }

      $posts = $query->latest()->take(9)->get();
      $mainPosts = $posts->take(3);
      $middlePosts = $posts->diff($mainPosts);

      $popularPosts = Post::orderBy('liked_users_count', 'DESC')->take(4)->get();

      $categories = Category::all();

      return view('blog.index', compact('mainPosts', 'middlePosts', 'popularPosts', 'randomPosts', 'categoryTitle', 'categories'));
  }

    /**
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        $relatedPosts = Post::with('category')
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        $comments = $post->comments()->with('user')->get();

        $one = $post;

        return view('blog.show', compact('one', 'relatedPosts', 'comments'));
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comments(Post $post, Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!$user = auth()->user()) {
            return redirect()->route('login')
                ->with('error', 'Please login/register first!');
        }

        $data = $request->validate(['message' => 'required|string']);
        $data['post_id'] = $post->id;
        $data['user_id'] = $user->id;

        Comment::create($data);

        return redirect()->route('blog.show', [$post->id]);
    }

    public function likes(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}
