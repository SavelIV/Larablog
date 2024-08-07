<div class="col-md-{{ $rows }} fetured-post blog-post" data-aos="fade-up">
    <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
        <div class="blog-post-thumbnail-wrapper">
            <img src="{{ url('storage/' . $post->main_image) }}"
                 alt="blog post . {{ $post->id }}" class="{{ $imgClass }}">
        </div>
    </a>
    <div class="d-flex justify-content-start">
        <a href="{{ route('blog.index', $post->category_id) }}" class="blog-post-permalink">
            <div class="{{ $blog }}post-category pt-1">{{ $post->category->title }}</div>
        </a>
        <div class="ml-2">•</div>
        @if(auth()->user())
            <div class="ml-2">
                <form action="{{ route('blog.post.likes', $post->id) }}" method="post">
                    @csrf
                    {{ $post->liked_users_count }}
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart text-danger"></i>
                    </button>
                </form>
            </div>
        @else
            <div class="ml-2">
                {{ $post->liked_users_count }}
                <a href="{{ route('login') }}">
                    <i class="fas fa-heart text-danger ml-2"></i>
                </a>
            </div>
        @endif
        <div class="ml-2">•</div>
        <div class="ml-2">
            {{ $post->comments_count }}
            <a href="{{ route('blog.show', $post->id) }} {{ $post->comments_count > 0 ? "#comments" : "#comment" }}">
                <i class="far fa-comment text-danger ml-2"></i></a>
        </div>
    </div>
    <a href="{{ route('blog.show', $post->id) }}" class="blog-post-permalink">
        <h6 class="{{ $blog }}post-title">{{ $post->shortTitle }}</h6>
    </a>
</div>
