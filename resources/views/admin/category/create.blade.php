@extends('layout.main')

@section('category')

<div class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col sm-6">
        <h2>Create Category</h2>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Category</li>
        </ol>
      </nav>




      
    </div>
  </div>
</div>
<hr>

<div class="card-body">
  <div class="form-group">


    <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

      <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group form-float">
          <label for="category-name">Category: </label>
          <input type="text" class="form-control" id="category" placeholder="Enter Category Name" name="categoryName">
          <span class="text-danger">@error('categoryName') {{ $message }} @enderror</span>
        </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>

  </div>
</div>




@endsection()