@extends('layouts.admin_layout')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>



    </div>


    <main class="py-4">

        <div class="container mb-3">
            <div class="row justify-content-center">
            <!--content Section -->

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<section class="py-0 py-xl-5">
<div class="container">
    <div class="row g-4">
        <!-- Counter item -->
        <div class="col-sm-6 col-xl-3">
            <div
                class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-25 rounded-3">
                <div class="ms-4 h6 fw-normal mb-0">

                    <p class="mb-0">Posts</p>
                </div>
            </div>
        </div>
        @if (Auth::user()->isAdmin())

<!-- Counter item -->
<div class="col-sm-6 col-xl-3">
    <div
        class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-25 rounded-3">
        <div class="ms-4 h6 fw-normal mb-0">
            <a class='link-underline link-underline-opacity-0 m-0 p-0' href="{{ route("admin.users.index") }}" > <p class="mb-0">Users</p></a>
        </div>
    </div>
</div>
<!-- Counter item -->
<div class="col-sm-6 col-xl-3">
    <div
        class="d-flex justify-content-center align-items-center p-4 bg-danger bg-opacity-25 rounded-3">
        <div class="ms-4 h6 fw-normal mb-0">

            <p class="mb-0">Add User</p>
        </div>
    </div>
</div>
        @endif

        <!-- Counter item -->
        <div class="col-sm-6 col-xl-3">
            <div
                class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-25 rounded-3">
                <div class="ms-4 h6 fw-normal mb-0">

                    <p class="mb-0">Settings</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
            </div>
        </div>

    </main>
@endsection
