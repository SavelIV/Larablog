<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * @param int|null $categoryId
     * @return Factory|View|Application
     */
    public function index(int $categoryId = null): Factory|View|Application
  {
      $query = Post::with('category', 'tags', 'likedUsers');

      $randomPosts = $query->get()->random(3);

      $categoryTitle = null;
      if ($categoryId) {
          $query->where('category_id', $categoryId);
          $categoryTitle = Category::find($categoryId)->title;
      }

      $posts = $query->latest()->get()->take(9);
      $mainPosts = $posts->take(3);
      $middlePosts = $posts->diff($mainPosts);

      $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

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
        $data = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('F d, Y - H:i');

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->get()
            ->take(3);

        return view('blog.show', compact('post', 'data', 'relatedPosts'));
    }
}
