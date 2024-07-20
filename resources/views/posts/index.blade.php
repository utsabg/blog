@extends('layouts.app')
@section('content')
@foreach($posts as $post)
    <div>
        this is the post
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->description }}</p>
        <a href="{{ url('posts/'.$post->id.'/edit') }}">Edit</a>
        <form action="{{ url('posts/'.$post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
@endsection
