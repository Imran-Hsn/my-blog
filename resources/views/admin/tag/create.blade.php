@extends('layout.main')

@section('category')

<div class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col sm-6">
        <h2>Create Tag</h2>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Tag</li>
        </ol>
      </nav>

    </div>
  </div>
</div>
<hr>

<div class="card-body">
  <div class="form-group">


    <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

      <form action="{{ route('tag.store') }}" method="POST">
        @csrf
        <div class="form-group form-float">
          <label for="tagName">Tag: </label>
          <input type="text" class="form-control" id="tag" placeholder="Enter Tag Name" name="tagName">
          <span class="text-danger">
            @error('tagName') 
            {{ $message }} 
            @enderror
          </span>

        </div>
          <a href="{{ route('tag.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
          <button type="submit" class="btn btn-primary btn-lg">Add</button>
      </form>
    </div>

  </div>
</div>




@endsection()