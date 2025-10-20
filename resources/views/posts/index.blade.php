@extends('layout.app')
@section('title') indexx @endsection
@section('content')
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>

    <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-primary">
        <tr>
            <th>Number</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user ? $post->user->name : 'Not Found' }}</td>
                <td>{{ $post->created_at -> format('y-m-d') }}</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection('content')
