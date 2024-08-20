@extends('layouts.admin_layout')
@section('content')
    <div>
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="card-title">{{ $post->title }}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->description }}</p>
                @if (Auth::user()->isAdmin() || Auth::id() ===  $post->user_id )
                    <form class="py-1" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info " href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                @endif
                <a class="btn btn-secondary " href="{{ url()->previous() }}" class="btn btn-primary">Return Back</a>
            </div>
            <div class="card-footer text-muted">
                Author: {{ $post->user->name ?? 'Unknown' }}
            </div>
        </div>
    @endsection
