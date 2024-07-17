@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User: {{$user->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User: {{$user->name}}</li>
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
                    <a class="btn btn-outline-info float-right" href="{{ route('users.index') }}">
                        View All Users
                    </a>
                </div>
                <div class="card-body">
                    <b class="text-muted">ID:</b>
                    <p>{{$user->id}}</p>
                    <b class="text-muted">Name:</b>
                    <p>{{$user->name}}</p>
                    <b class="text-muted">E-mail:</b>
                    <p>{{$user->email}}</p>
                    <b class="text-muted">Role</b>
                    <p>{{$user->role}}</p>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
