@extends('layout.main')

@section('category')

<h1>Add Category</h1>
<hr>

<div class="container">
    <form action="https://www.w3schools.com/action_page.php" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="uname">Category:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Category" name="uname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection()