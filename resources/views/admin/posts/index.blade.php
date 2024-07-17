@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="mb-3">
                        <a class="btn btn-outline-primary" href="{{ route('posts.create') }}">
                            Create New Post
                        </a>
                    </div>
                    <div>
                        <form class="row row-cols-lg-auto g-1">
                            <div class="col">
                               <select class="form-control" name="category_id">
                                   <option value="">All Categories</option>
                                   @foreach($categories as $category)
                                       <option value="{{ $category->id }}"
                                           {{ $category_id == $category->id ? ' selected' : ''}}>
                                           {{ $category->title }}
                                       </option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="col">
                                <select class="form-control" name="tag_id">
                                    <option value="">All Tags</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ $tag_id == $tag->id ? ' selected' : ''}}>
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="q" value="{{ $q }}"
                                       placeholder="Title Search...">
                            </div>
                            <div class="col">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <b>{{ $message }}</b>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Category</th>
                            <th>Tag(-s)</th>
                            <th>Main Image</th>
                            <th>Preview Image</th>
                            <th width="240px">Action</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class={{ isset($post->deleted_at) ? 'text-danger' : ''}} >{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->tags->implode('title', ', ') }}</td>
                                <td><img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" width="100"
                                         height="100" class="img-circle elevation-2"></td>
                                <td><img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image"
                                         width="100" height="100" class="img-circle elevation-2"></td>
                                <td>
                                    @if(!isset($post->deleted_at))
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a
                                                class="btn btn-outline-info"
                                                href="{{ route('posts.show', $post->id) }}">
                                                Show
                                            </a>
                                            <a
                                                class="btn btn-outline-success"
                                                href="{{ route('posts.edit', $post->id) }}">
                                                Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <a
                                            class="btn btn-outline-danger"
                                            href="{{ route('posts.index', $post->id) }}">
                                            Trashed
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
