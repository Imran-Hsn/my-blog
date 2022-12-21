@extends('layout.main')
@section('post')

<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Edit Post</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<hr>

<div class="card-body">
    <div class="form-group">
        <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" id="postId" value="{{ $post->id }}" name="postId">

                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" class="form-control" id="postTitle" value="{{ $post->title }}" name="postTitle">
                    <span class="text-danger">@error('postTitle') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="postDescription">Description: </label>
                    <textarea class="form-control" id="postDescription" cols="30" rows="5"  name="postDescription">{{ $post->description }}</textarea>
                    <span class="text-danger">@error('postDescription') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="postCategory">Category: </label>
                    <select name="postCategory" id="postCategory" class="form-control">
                        <option value="" class="d-none" selected>---Select Category---</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('postCategory') {{ $message }} @enderror</span>
                </div>

                <div class="form-group d-flex">
                    <label for="postTags">Tags: </label>
                    <div class="custom-control custom-checkbox">
                        @foreach($tags as $tag)
                        <input class="custom-control-checkbox" type="checkbox" name="postTags[]" value="{{ $tag->id }}" id="postTags{{ $tag->id }}" @foreach($post->tags as $selected_tag)
                        @if($tag->id == $selected_tag->id) checked @endif
                        @endforeach>
                        <label class="mr-3" for="postTags{{ $tag->id }}">{{ $tag->name }} </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <label for="postImage">Image: </label>
                            <div class="custom-file">
                                <input type="file" name="postImage" id="postImage" class="custom-file-input">
                                <label for="postImage" class="custom-file-label text-truncate">Choose file...</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="max-height: 100px; max-width: 100px; overflow: hidden; margin-left: auto;">
                                <img src="{{ asset($post->image) }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('post.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection()