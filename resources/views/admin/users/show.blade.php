@extends('layouts.admin_layout')
@section('content')
    <h4 class="c-grey-900">
        Show User
    </h4>
    <div class="mT-30">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            {{ $user->role }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>
                            {{ $user->created_at }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Updated at
                        </th>
                        <td>
                            {{ $user->updated_at }}

                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
@endsection
