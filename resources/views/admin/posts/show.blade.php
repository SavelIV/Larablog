@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post: {{$post->title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Post: {{$post->title}}</li>
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
                    <b class="text-muted">ID:</b>
                    <p>{{$post->id}}</p>
                    <b class="text-muted">Title:</b>
                    <p>{{$post->title}}</p>
                    <b class="text-muted">Created At:</b>
                    <p>{{$post->created_at}}</p>
                    <b class="text-muted">Content:</b>
                    <p>{!!$post->content !!}</p>
                    <div class="row">
                        <div class="col-6">
                            <b class="text-muted">Main Image:</b>
                            <p><img src="{{ url('/storage/' . $post->main_image) }}" alt="main_image" width="200"
                                    height="200" class="img img-responsive"></p>
                        </div>
                        <div class="col col-6">
                            <b class="text-muted">Preview Image:</b>
                            <p><img src="{{ url('/storage/' . $post->preview_image) }}" alt="preview_image" width="200"
                                    height="200" class="img img-responsive"></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
