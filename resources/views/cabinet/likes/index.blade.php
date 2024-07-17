@extends('cabinet.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Liked Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('cabinet.index') }}">Cabinet</a></li>
                            <li class="breadcrumb-item active">Liked Posts</li>
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
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <b>{{ $message }}</b>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Post ID</th>
                            <th>Post Title</th>
                            <th width="240px">Action</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class={{ isset($post->deleted_at) ? 'text-danger' : ''}} >{{ $post->title }}</td>
                                <td>
                                    <form action="{{ route('likes.destroy', $post->id) }}" method="POST">
                                        <a
                                            class="btn btn-outline-info"
                                            href="{{ route('likes.show', $post->id) }}">
                                            Show
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">
                                            Unlike
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
