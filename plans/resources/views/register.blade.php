@extends('layout.account')
@section('title', 'Register')
@section('body')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('front/assets/img/login.png') }}" alt="login" class="login-card-img" />
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <a href="{{ url('/') }}"><img src="https://res.cloudinary.com/dx2o9ki2g/image/upload/v1698238484/gsuwxjg7gfnhs4fgrxsd.jpg
" alt="logo" title="Go to home" class="logo" /></a>
                            </div>
                            <p class="login-card-description">Register account</p>
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                @if(session('notification'))
                                    <div class="alert alert-success text-small">
                                        {{ session('notification') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="FullName" class="sr-only">Full Name</label>
                                    <input type="text" name="FullName" id="FullName" class="form-control" placeholder="Enter full name" />
                                    @error("FullName")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="UserName" class="sr-only">Username</label>
                                    <input type="text" name="UserName" id="UserName" class="form-control" placeholder="Enter username" />
                                    @error("UserName")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Phone" class="sr-only">Phone</label>
                                    <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Enter phone number" />
                                    @error("Phone")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Address" class="sr-only">Address</label>
                                    <input type="text" name="Address" id="Address" class="form-control" placeholder="Enter Address" />
                                    @error("Address")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="sr-only">Email</label>
                                    <input type="email" name="Email" id="Email" class="form-control" placeholder="Enter email address" />
                                    @error("Email")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="Password" class="sr-only">Password</label>
                                    <input type="password" name="Password" id="Password" class="form-control" placeholder="***********" />
                                    @error("Password")
                                        <p class="text-danger text-small"><i>{{$message}}</i></p>
                                    @enderror
                                </div>

                                <label class="input-check">
                                    Show Password <input type="checkbox" onclick="showPassword()" />
                                    <span class="checkmark"></span>
                                </label>

                                <button type="submit" class="btn btn-block login-btn mb-4">Register</button>
                            </form>
                            <p class="login-card-footer-text">Have already an account? <a href="{{ route('login.form') }}" class="text-reset">Login now</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
