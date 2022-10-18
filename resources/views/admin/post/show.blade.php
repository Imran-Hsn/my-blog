@extends('layout.main')
@section('post')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Post Title</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Date</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category_id }}</td>
            <td>tags_will_go_here</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->author_id }}</td>
        </tr>
    </tbody>
</table>

@endsection()