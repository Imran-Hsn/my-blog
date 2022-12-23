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
                            <a class="btn btn-primary" href="{{ route('category.create') }}"><i class="fa fa-plus"></i> Add Author</a>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="table-responsive{-sm | -md | -lg | -xl}">
                        <table class="table table-hover text-dark overflow-auto">
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
