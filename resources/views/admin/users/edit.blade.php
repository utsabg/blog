@extends('layouts.admin_layout')
@section('content')
    <h4 class="c-grey-900">
        Update User
    </h4>
    <div class="mt-2">
        <form action="{{ route('admin.users.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('name') ? 'has-validation' : '' }}">
                <label for="name">User Name</label>
                <input type="text" id="name" name="name" class="form-control"
                       value="{{ isset($user) ? $user->name : '' }}" required>

                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-validation' : '' }}">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ isset($user) ? $user->email : '' }}" required>

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-validation' : '' }}">
                <label for="password">Password</label>

                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Leave empty for old one">

                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group {{ $errors->has('role') ? 'has-validation' : '' }}">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="viewer" {{ (isset($user) ? $user->role : '') == 'viewer' ? 'selected' : '' }}>Viewer
                    </option>
                    <option value="editor" {{ (isset($user) ? $user->role : '') == 'editor' ? 'selected' : '' }}>Editor
                    </option>
                    <option value="admin" {{ (isset($user) ? $user->role : '') == 'admin' ? 'selected' : '' }}>Admin
                    </option>
                </select>

                @if ($errors->has('role'))
                    <div class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </div>
                @endif
            </div>
            <div>
                <input class="btn btn-danger mt-2" type="submit" value="Save">
            </div>
        </form>
    </div>
@endsection
