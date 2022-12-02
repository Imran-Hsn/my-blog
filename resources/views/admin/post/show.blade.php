@extends('layout.main')
@section('post')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col sm-6">
                <h2>Show Post</h2>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show Post</li>
                </ol>
            </nav>

        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-item-center">
                            <h5 class="card-title">Show Post</h5>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover text-dark">
                        <tbody>
                            <tr>
                                <th class="w-25">Title</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <div style="max-height: 200x; max-width: 160px; overflow:hidden;">
                                        <img src="{{ asset($post->image) }}" class="img-fluid">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    @foreach($post->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Create Date</th>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $post->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection()