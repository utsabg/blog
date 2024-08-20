@extends('layouts.admin_layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                @if (Auth::user()->isEditor() || Auth::user()->isAdmin())
                    <section class="py-0 py-xl-5">
                        <div class="container">
                            <div class="row g-4">
                                <!-- Counter item -->

                                <a class="nav-link align-items-center col-sm-12 col-xl-6 px-2"
                                    href="{{ route('posts.index') }}">
                                    <div
                                        class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-25 rounded-3">
                                        <div class="ms-4 h6 fw-normal mb-0">


                                            My Posts

                                            {{-- <p class="mb-0">Posts</p> --}}
                                        </div>
                                    </div>
                                </a>


                                @if (Auth::user()->isAdmin())
                                    <!-- Counter item -->


                                    <a class="nav-link align-items-center col-sm-12 col-xl-6 px-2"
                                        href="{{ route('admin.users.index') }}">

                                        <div
                                            class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-25 rounded-3">
                                            <div class="ms-4 h6 fw-normal mb-0">
                                                Users
                                                {{-- <p class="mb-0">Users</p> --}}
                                            </div>
                                        </div>

                                    </a>
                                    <!-- Counter item -->
                                    {{-- <div class="col-sm-12 col-xl-6 px-2">
                                    <div
                                        class="d-flex justify-content-center align-items-center p-4 bg-danger bg-opacity-25 rounded-3">
                                        <div class="ms-4 h6 fw-normal mb-0">

                                            <p class="mb-0">Add User</p>
                                        </div>
                                    </div>
                                </div> --}}
                                @endif

                                <!-- Counter item -->
                                {{-- <div class="col-sm-12 col-xl-6 px-2">
                                <div
                                    class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-25 rounded-3">
                                    <div class="ms-4 h6 fw-normal mb-0">

                                        <p class="mb-0">Settings</p>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </section>
                @endif
                <section class="py-1 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>All Posts</h1>
                                <div class="row">
                                    @foreach ($posts as $post)
                                        <div class="col-md-6">
                                            <div class="card mt-2">
                                                <div class="card-header">
                                                    <h4 class="card-title">{{ $post->title }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">

                                                        {{ \Illuminate\Support\Str::limit($post->description, 100) }}
                                                    </p>
                                                    <a href="{{ route('post.show', $post->id) }}"
                                                        class="btn btn-primary">View</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    Author: {{ $post->user->name ?? 'Unknown' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{ $posts->links() }}
            </div>
        </div>
    </main>
@endsection
