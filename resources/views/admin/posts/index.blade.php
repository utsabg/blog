@extends('layouts.admin_layout')
@section('content')
<div class="col-md-8">
    <h1>My Posts</h1>
    <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>
    @foreach ($posts as $post)
    <div class="card mt-2">
        <div class="card-header">
            <h4 class="card-title">{{ $post->title }}</h4>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $post->description }}</p>
            <a class="btn btn-info" href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">Edit</a>
            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">View</a>

        </div>
        {{-- <form action="{{ url('posts/'.$post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form> --}}
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection
