@extends('layout.main')

@section('author')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Author</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Author</li>
                </ol>
            </nav>

        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-auto col-sm-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-item-center">
                            <h5 class="card-title">Author List</h5>
                            <a class="btn btn-primary" href="{{ route('author.create') }}"><i class="fa fa-plus"></i> Add Author</a>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="table-responsive">
                        <table class="table table-hover text-dark overflow-auto">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('author.edit', [$author->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fas fa-edit"></i></a>
                                        <form action="{{ route('author.destroy', [$author->id]) }}" onclick="return confirm('Are You Sure To Delete?')" class="mr-1" method="POST">
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
</div>

<div class="container-fluid mt-2">
</div>

@endsection()