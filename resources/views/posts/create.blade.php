@extends('layouts.app')
@section('content')

<form action="{{ url('posts') }}" method="POST">
    {{-- @csrf --}}
    <input type="text" name="title" placeholder="title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <button type="submit">Create a post</button>
</form>
@endsection


