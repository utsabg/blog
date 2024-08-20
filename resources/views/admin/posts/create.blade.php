@extends('layouts.admin_layout')
@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" required name="title" placeholder="Blog Title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" required rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create a post</button>
                <a class="btn btn-secondary " href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

            </form>

        </div>
    </div>
@endsection
