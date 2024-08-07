@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $one->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $one->date }} •
                Category: {{ $one->category->title }} •
                {{ $one->comments_count }} Comments •
                {{ $one->liked_users_count }} Likes
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ url('storage/' . $one->preview_image) }}" alt="featured image of post#{{ $one->id }}"
                     class="img-fluid">
                <div class="d-flex justify-content-start">
                    @auth()
                        <div class="ml-2">
                            <form action="{{ route('blog.post.likes', $one->id) }}" method="post">
                                @csrf
                                {{ $one->liked_users_count }}
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fa{{ auth()->user()->likedPosts->contains($one->id) ? 's' : 'r' }} fa-heart text-danger"></i>
                                </button>
                            </form>
                        </div>
                    @endauth
                    @guest()
                        <div class="ml-2">
                            {{ $one->liked_users_count }}
                            <a href="{{ route('login') }}">
                                <i class="fas fa-heart text-danger ml-2"></i>
                            </a>
                        </div>
                        @endguest
                    <div class="ml-2">•</div>
                    <div class="ml-2">
                        {{ $one->comments_count }}
                        <a href="{{ route('blog.show', $one->id) }} {{ $one->comments_count > 0 ? "#comments" : "#comment" }}">
                            <i class="far fa-comment text-danger ml-2"></i></a>
                    </div>
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $one->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $post)
                                    @include('blog.includes.post', ['rows' => 4, 'imgClass' => 'post-thumbnail', 'blog' => ''])
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @if($comments->count() > 0)
                        <section id="comments" class="comments-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{ $comments->count() }})</h2>
                            <div style="background-color: #f8f9fa; padding: .75rem 1.25rem;">
                                @foreach($comments as $comment)
                                    <div style="border-bottom: 1px solid #e9ecef; padding: 8px 0;">
                                        <img width="40" height="40"
                                             style="border-radius: 50%; height: 1.875rem; width: 1.875rem; float: left;"
                                             src="{{ url('/storage/' . $comment->user->image) }}"
                                             alt="User Image">
                                        <div
                                            style="color: #78838e; margin-left: 40px; box-sizing: border-box; word-wrap: break-word;">
                                            <span style="color: #495057; display: block; font-weight: 600;">
                                              {{$comment->user->name}}
                                              <span
                                                  style="font-size: 12px; font-weight: 400; float: right !important;">{{$comment->date}}</span>
                                            </span>
                                            {!! $comment->message !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section id="comment" class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Comment</h2>
                        <form action="{{ route('blog.post.comments', $one->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="message" class="sr-only">Comment</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="Comment"
                                              rows="10"></textarea>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" name="post" value="{{$one->id}}">
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
