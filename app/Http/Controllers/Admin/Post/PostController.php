<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Application|Factory|View
    {
        $data['q'] = $request->query('q');
        $data['category_id'] = $request->query('category_id');
        $data['categories'] = Category::all();

        $data['tag_id'] = $request->query('tag_id');
        $data['tags'] = Tag::all();

        $query = Post::withTrashed()->where(function ($query) use ($data) {
            $query->where('title', 'like', '%' . $data['q'] . '%');
            if ($data['category_id']) {
                $query->where('posts.category_id', $data['category_id']);
            }
            if ($data['tag_id']) {
                $query->with('tags')->whereRelation('tags', 'tags.id', '=', $data['tag_id']);
            }
        });

        $data['posts'] = $query->paginate(5)->withQueryString();

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'required|string|unique:posts',
            'content' => 'required|string',
            'main_image' => 'sometimes|image:jpg,jpeg,png',
            'preview_image' => 'sometimes|image:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ], [], [
            'category_id' => 'Category',
            'tag_ids' => 'Tags',
        ]);

        $this->service->store($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): Application|Factory|View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = request()->validate([
            'title' => 'required|string|unique:posts,title,' . $post->id . ',id,deleted_at,NULL',
            'content' => 'required|string',
            'main_image' => 'sometimes|image:jpg,jpeg,png',
            'preview_image' => 'sometimes|image:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ], [], [
            'category_id' => 'Category',
            'tag_ids' => 'Tags',
        ]);

        $post = $this->service->store($data, $post);

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
