@extends('layout.main')

@section('post')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-auto">
                <h2>Post</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                </ol>
            </nav>

        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 col-md-auto col-sm-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-item-center">
                            <h5 class="card-title">Post List</h5>
                            <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Post</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <div style="max-height: 40px; max-width: 70px; overflow:hidden;">
                                            <img src="{{ asset($post->image) }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td>{{ Str::limit($post->description, 20) }}</td>
                                    <td>{{ $post->category->name ?? 'none'}}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                        <span class="badge badge-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $post->user->name ?? 'name' }}</td>
                                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fas fa-eye"></i></a>
                                        <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fa fas fa-edit"></i></a>
                                        <form action="{{ route('post.destroy', [$post->id]) }}" onclick="return confirm('Are You Sure To Delete?')" method="POST" class="mr-1">
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
@endsection()
