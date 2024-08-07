@extends('cabinet.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Settings: {{$user->name}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('cabinet.index') }}">Cabinet</a></li>
                            <li class="breadcrumb-item active">User Settings: {{$user->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <b>{{ $message }}</b>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('cabinet.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="title">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="main_image">Change image</label>
                            <div class="mb-2">
                                <img src="{{ url('storage/' . $user->image) }}" alt="User image" width="100"
                                     height="100" class="img-circle elevation-2">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label">Select new image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mt-3">Save Settings</button>
                    </form>
                    <form action="{{ route('cabinet.settings.deleteImage') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger mt-3"
                                onclick="return confirm('Are you sure?')">
                            Delete Image
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
