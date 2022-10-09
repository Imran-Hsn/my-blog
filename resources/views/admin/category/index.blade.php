@extends('layout.main')

@section('category')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col sm-6">
        <h2>Category</h2>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-item-center">
              <h5 class="card-title">Category List</h5>
              <a class="btn btn-primary" href="#">Create Category</a>
            </div>
          </div>

          <!-- table -->

          <div class="card-body">
            <table class="table table-bordered text-dark">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Post Count</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>Imran</td>
                  <td>imran</td>
                  <td>1</td>
                  <td>bla bla</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- end of table -->

        </div>
      </div>
    </div>
  </div>
</div>





@endsection()