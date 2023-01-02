@extends('layout.main')

@section('author')

<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Edit Author</h2>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('author.index') }}">Author</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Author</li>
                </ol>
            </nav>

        </div>
    </div>
</div>
<hr>

<div class="card-body">
    <div class="form-group">

        <!-- Edit Author -->
        <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

            <div class="form-group">
                <form action="{{ route('author.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" id="authorId" value="{{ $data->id }}" name="authorId">
                    <label for="authorName">Name: </label>
                    <input type="text" class="form-control" id="author" value="{{ $data->name }}" name="authorName">
                    <span class="text-danger">@error('authorName') {{ $message }} @enderror</span>

                    <label for="authorName">Role: </label>
                    <input type="text" class="form-control" id="role" value="{{ $data->role_id }}" name="roleId">
                    <span class="text-danger">@error('roleId') {{ $message }} @enderror</span>
            </div>
            <a href="{{ route('author.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </form>
        </div>

    </div>
</div>




@endsection()
