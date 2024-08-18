@extends('layouts.admin_layout')
@section('content')
<h4 class="c-grey-900">
    User List
</h4>
<div class="mT-30">
    @if (Auth::user()->isAdmin())
    <!-- Content for admin users -->
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                   Add User
                </a>
            </div>
        </div>
    @endif
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
            <thead>
            <tr>

                <th>
                   ID
                </th>
                <th>
                   Name
                </th>
                <th>
                  Email
                </th>

                <th>
                    Role
                </th>
                <th>
                   Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr data-entry-id="{{ $user->id }}">

                    <td>
                        {{ $user->id ?? '' }}
                    </td>
                    <td>
                        {{ $user->name ?? '' }}
                    </td>
                    <td>
                        {{ $user->email ?? '' }}
                    </td>
                    <td>
                        {{ $user->role ?? '' }}
                    </td>
                    <td>

                            <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                               View
                            </a>



                            <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                            </form>


                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
