@extends('layout.main')
@section('post')

<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Create Post</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<hr>

<div class="card-body">
    <div class="form-group">
        <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title: </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Post Title">
                    <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="category">Category: </label>
                    <select name="category" id="category" class="form-control">
                        <option value="" style="display: none;">--Select Category--</option>
                        @foreach($data as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('category') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="image">Image: </label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label for="image" class="custom-file-label text-truncate">Choose file...</label>
                    </div>
                    <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                </div>

                <div class="form-group d-flex">
                    <label for="tags" class="mr-3">Tags: </label>
                    @foreach($tags as $tag)
                    <div class="custom-control custom-checkbox mr-3">
                        <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                        <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                    </div>
                    @endforeach()
                </div>

                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Enter Post Description">{{ old('description') }}</textarea>
                    <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                </div>

                <a href="{{ route('post.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
                <button type="submit" class="btn btn-primary btn-lg">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection()