@extends('layout.main')

@section('tags')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Tags</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tags</li>
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
                            <h5 class="card-title">Tags List</h5>
                            <a class="btn btn-primary" href="{{ route('tag.create') }}"><i class="fa fa-plus"></i> Add Tag</a>
                        </div>
                    </div>

                    <!--Tags List -->
                    <table class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($items as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>{{ $tag->updated_at }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('tag.edit', [$tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fas fa-edit"></i></a>
                                    <form action="{{ route('tag.destroy', [$tag->id]) }}" method="post" onclick="return confirm('Are You Sure To Delete?')" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fas fa-trash"></i></button>
                                    </form>
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
