@extends('cabinet.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comment: {{$comment->id}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('cabinet.index') }}">Cabinet</a></li>
                            <li class="breadcrumb-item active">Comment: {{$comment->id}}</li>
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
                    <a class="btn btn-outline-info float-right" href="{{ route('comments.index') }}">
                        View All Comments
                    </a>
                </div>
                <div class="card-body">
                    <b class="text-muted">ID:</b>
                    <p>{{$comment->id}}</p>
                    <b class="text-muted">Message:</b>
                    <p>{{$comment->message}}</p>
                    <b class="text-muted">Created At:</b>
                    <p>{{$comment->created_at}}</p>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
