@extends('dashboard.layouts.layout')
@section('title', 'User Account')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    {{-- <div class="card-header pb-0">
                        <h6>User Account</h6>
                    </div> --}}
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">Edit Profile</p>
                                                {{-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{-- <p class="text-uppercase text-sm">User Information</p> --}}
                                            <form action="{{ url('/dashboard/account/update/' . $accountUser->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="form-control-label">Username</label>
                                                            <input name="name" class="form-control" type="text"
                                                                value="{{ $accountUser->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Email
                                                                address</label>
                                                            <input name="email" class="form-control" type="email"
                                                                value="{{ $accountUser->email }}">
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        {{-- <p class="mb-0">Edit Profile</p> --}}
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm ms-auto">Submit</button>
                                                    </div>

                                                    {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">First
                                                            name</label>
                                                        <input class="form-control" type="text" value="Jesse">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Last
                                                            name</label>
                                                        <input class="form-control" type="text" value="Lucky">
                                                    </div>
                                                </div> --}}
                                                </div>
                                                <hr class="horizontal dark">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
