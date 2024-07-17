@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                    <a class="btn btn-outline-primary" href="{{ route('users.create') }}">
                        Create New User
                    </a>
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
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Role</th>
                            <th width="240px">Action</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class={{ isset($user->deleted_at) ? 'text-danger' : ''}} >{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleName($user->role ?? null) }}</td>
                                <td>
                                    @if(!isset($user->deleted_at))
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        <a
                                            class="btn btn-outline-info"
                                            href="{{ route('users.show', $user->id) }}">
                                            Show
                                        </a>
                                        <a
                                            class="btn btn-outline-success"
                                            href="{{ route('users.edit', $user->id) }}">
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
                                            href="{{ route('users.index', $user->id) }}">
                                            Trashed
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
