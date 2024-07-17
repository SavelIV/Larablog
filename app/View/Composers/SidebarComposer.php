<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class SidebarComposer
{
    protected array $data;

    public function __construct()
    {
        $this->data['catsCount'] = Category::all()->count();
        $this->data['tagsCount'] = Tag::all()->count();
        $this->data['postsCount'] = Post::all()->count();
        $this->data['usersCount'] = User::all()->count();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with($this->data);
    }
}
