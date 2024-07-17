@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">latest Publications {{ $categoryTitle ? '(category: ' . $categoryTitle . ')' : '' }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($mainPosts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ url('storage/' . $post->main_image) }}"
                                         alt="blog post . {{ $post->id }}">
                                </div>
                            </a>
                            <a href="{{ route('blog.index', $post->category_id) }}" class="blog-post-permalink">
                                <p class="blog-post-category">Category: {{ $post->category->title }}</p>
                            </a>
                            <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <h5 class="widget-title" data-aos="fade-right">Featured Posts {{ $categoryTitle ? '(in category ' . $categoryTitle . ')' : '' }}</h5>
                    <section>
                        <div class="row blog-post-row">
                            @foreach($middlePosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-right">
                                    <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ url('storage/' . $post->main_image) }}"
                                                 alt="blog post . {{ $post->id }}">
                                        </div>
                                    </a>
                                    <a href="{{ route('blog.index', $post->category_id) }}" class="blog-post-permalink">
                                        <p class="blog-post-category">{{ $post->category->title }}</p>
                                    </a>
                                    <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title" data-aos="fade-left">Random Posts</h5>
                        <div class="post-carousel" data-aos="fade-left">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($randomPosts as $id => $post)
                                        <li data-target="#carouselId" data-slide-to="{{ $id }}" class="{{ $id == 0 ? 'active' : ''}}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($randomPosts as $id => $post)
                                        <figure class="carousel-item {{ $id == 0 ? 'active' : ''}}">
                                            <img src="{{ url('storage/' . $post->main_image) }}"
                                                 alt="blog post . {{ $post->id }}">
                                            <figcaption class="post-title">
                                                <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
                                            </figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title" data-aos="fade-left">Popular Posts</h5>
                        <ul class="post-list">
                            @foreach($popularPosts as $post)
                                <li class="post" data-aos="fade-left">
                                    <a href="{{ route('blog.show', $post->id) }}" class="post-permalink media">
                                        <img src=" {{ url('storage/' . $post->main_image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-post-list pb-2">
                        <h5 class="widget-title" data-aos="fade-left">Categories</h5>
                        <ul class="post-list">
                            @foreach($categories as $cat)
                                <li class="post" data-aos="fade-left">
                                    <a href="{{ route('blog.index', $cat->id) }}" class="post-permalink media">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $cat->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
