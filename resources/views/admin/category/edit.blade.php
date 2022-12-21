@extends('layout.main')

@section('category')

<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Edit Category</h2>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                </ol>
            </nav>

        </div>
    </div>
</div>
<hr>

<div class="card-body">
    <div class="form-group">

        <!-- Edit Category -->
        <div class="col-12 col-lg-8 col-md-8 col-sm-12 offset-lg-2 offset-md-2">

            <div class="form-group">
                <form action="{{ route('category.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" id="categoryId" value="{{ $data->id }}" name="categoryId">
                    <label for="categoryName">Category: </label>
                    <input type="text" class="form-control" id="category" value="{{ $data->name }}" name="categoryName">
                    <span class="text-danger">@error('categoryName') {{ $message }} @enderror</span>
            </div>
            <a href="{{ route('category.index') }}"><button type="button" class="btn btn-warning mr-3 btn-lg">Back</button></a>
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </form>
        </div>

    </div>
</div>




@endsection()
