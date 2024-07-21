@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="Blog Title" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{$post->description}}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Update</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary float-end">Cancel</a>
            </form>

            <div class="card-footer p-0 pt-2"><form action="{{route('post.delete',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger " type="submit">Delete</button>
                </div> </form>



        </div>
    </div>
@endsection
