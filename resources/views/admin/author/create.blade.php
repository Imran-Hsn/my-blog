@extends('layout.main')

@section('author')

<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Create Author</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('author.index') }}">Author</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Author</li>
                </ol>
            </nav>

        </div>
    </div>
</div>
<hr>

<div class="card-body">
    <div class="form-group">
        <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">
            <form action="{{ route('author.store') }}" method="POST">
                @csrf
                <div class="form-group form-float">
                    <label for="author-name">Author: </label>
                    <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="authorName">
                    <span class="text-danger">@error('authorName') {{ $message }} @enderror</span>
                </div>
                <a href="{{ route('author.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
                <button type="submit" class="btn btn-primary btn-lg">Add</button>
            </form>
        </div>

    </div>
</div>


@endsection()
