@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">latest
                Posts {{ $categoryTitle ? '(category: ' . $categoryTitle . ')' : '' }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($mainPosts as $post)
                        @include('blog.includes.post', ['rows' => 4, 'imgClass' => '', 'blog' => 'blog-'])
                    @endforeach
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    @if($middlePosts->count() > 0)
                        <h5 class="widget-title" data-aos="fade-right">
                            Featured Posts {{ $categoryTitle ? '(in category ' . $categoryTitle . ')' : '' }}
                        </h5>
                        <section>
                            <div class="row blog-post-row">
                                @foreach($middlePosts as $post)
                                    @include('blog.includes.post', ['rows' => 6, 'imgClass' => '', 'blog' => 'blog-'])
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
                <div class="col-md-4 sidebar">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title" data-aos="fade-left">Random Posts</h5>
                        <div class="post-carousel" data-aos="fade-left">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($randomPosts as $id => $post)
                                        <li data-target="#carouselId" data-slide-to="{{ $id }}"
                                            class="{{ $id == 0 ? 'active' : ''}}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($randomPosts as $id => $post)
                                        <figure class="carousel-item {{ $id == 0 ? 'active' : ''}}">
                                            <img src="{{ url('storage/' . $post->main_image) }}"
                                                 alt="blog post . {{ $post->id }}">
                                            <figcaption class="post-title">
                                                <a href="{{ route('blog.show', $post->id) }}">{{ $post->shortTitle }}</a>
                                            </figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        @if($popularPosts->count() > 0)
                            <h5 class="widget-title" data-aos="fade-left">Popular Posts</h5>
                            <ul class="post-list">
                                @foreach($popularPosts as $post)
                                    <li class="post" data-aos="fade-left">
                                        <a href="{{ route('blog.show', $post->id) }}" class="post-permalink media">
                                            <img src=" {{ url('storage/' . $post->main_image) }}" alt="blog post">
                                            <div class="media-body">
                                                <h6 class="post-title">{{ $post->shortTitle }}</h6>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="widget widget-post-list pb-2">
                        <h5 class="widget-title" data-aos="fade-left">Categories</h5>
                        <ul class="post-list">
                            @foreach($categories as $category)
                                <li class="post" data-aos="fade-left">
                                    <a href="{{ route('blog.index', $category->id) }}" class="post-permalink media">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $category->title }}</h6>
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
