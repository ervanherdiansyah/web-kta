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
            @include('dashboard.component.footer.footer')
        </footer>
    </div>
@endsection
