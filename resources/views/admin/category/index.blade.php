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
              <a class="btn btn-primary" href="{{ route('category.create') }}"><i class="fa fa-plus"></i> Add Category</a>
            </div>
          </div>



          <!-- table -->
          <table class="table table-hover text-dark">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($items as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td class="d-flex">
                  <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fas fa-edit"></i></a>
                  <form action="{{ route('category.destroy', [$category->id]) }}" onclick="return confirm('Are You Sure To Delete?')" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt-2">
  {{ $items->links() }}
</div>

@endsection()