@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create a post</button>

            </form>

        </div>
    </div>
@endsection
