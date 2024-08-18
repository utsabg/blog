@extends('layouts.admin_layout')
@section('content')
    <h4 class="c-grey-900">
        Create User
    </h4>
    <div class="mt-2">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">User Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="" required>

                @if ($errors->has('name'))
                    <p class="helper-block invalid-feedback">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="" required>

                @if ($errors->has('email'))
                    <p class="helper-block invalid-feedback">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Password</label>

                <input type="password" id="password" name="password" class="form-control"
                    required placeholder="must be 8 character long">

                @if ($errors->has('password'))
                    <p class="helper-block invalid-feedback">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            {{-- <div class="form-group ">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>


                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div> --}}
            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="viewer" selected >Viewer
                    </option>
                    <option value="editor" >Editor
                    </option>
                    <option value="admin">Admin
                    </option>
                </select>

                @if ($errors->has('role'))
                    <p class="helper-block invalid-feedback">
                        {{ $errors->first('role') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="mt-3 btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
@endsection
