@extends('cabinet.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('cabinet.index') }}">Cabinet</a></li>
                            <li class="breadcrumb-item active">Comments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <b>{{ $message }}</b>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Message...</th>
                            <th width="240px">Action</th>
                        </tr>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ str($comment->message)->limit(20)}}</td>
                                <td>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        <a
                                            class="btn btn-outline-info"
                                            href="{{ route('comments.show', $comment->id) }}">
                                            Show
                                        </a>
                                        <a
                                            class="btn btn-outline-success"
                                            href="{{ route('comments.edit', $comment->id) }}">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
