@extends('layouts.app')
@section('content')

    <div>
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title">{{ $post->title }}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                <form action="{{route('post.delete',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <a class="btn btn-info" href="{{ route('post.edit',$post->id) }}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
    </div>
@endsection
