@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post: {{$post->shortTitle}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Post: {{$post->shortTitle}}</li>
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
                    <a class="btn btn-outline-info float-right" href="{{ route('posts.index') }}">
                        View All Posts
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Content</label>
                            <textarea class="form-control" name="content" id="summernote">
                                {{ $post->content }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="main_image">Change Main image</label>
                            <div class="mb-2">
                                <img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" width="100" height="100" class="img-circle elevation-2">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                    <label class="custom-file-label">Select new main image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="preview_image">Change Preview image</label>
                            <div class="mb-2">
                                <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" width="100" height="100" class="img-circle elevation-2">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="preview_image"
                                           name="preview_image">
                                    <label class="custom-file-label">Select new preview image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" disabled selected>Select Category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? ' selected' : ''}}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select Tag" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{ $post->tags->contains($tag->id) ? ' selected' : '' }} value="{{ $tag->id }}">
                                        {{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-success mt-3">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
