@extends('layout.main')

@section('category')

<h1>Add Category</h1>
<hr>

{{$errors}}
<div class="container">
  
    <form action="{{ url('category') }}" method="POST">
      @csrf
    <div class="form-group form-float">
      <label for="uname">Category:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Category" name="tagname" required>
      
    </div>
    <a class="btn btn-warning" href="{{ url('category') }}">Back</a>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>


@endsection()