@extends('layout.account')
@section('title','Login')
@section('body')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="https://images.pexels.com/photos/4153146/pexels-photo-4153146.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1
" alt="login" class="login-card-img" />
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <a href="{{ url('/') }}"><img src="https://res.cloudinary.com/dx2o9ki2g/image/upload/v1698238484/gsuwxjg7gfnhs4fgrxsd.jpg
" alt="Plant Nest" style="font-size: 100px;" title="Go to home" class="logo" /></a>
                        </div>
                        <p class="login-card-description">Login to your account</p>
                            <form action="{{ route('login') }}" method="post">
                            @csrf
                                @if(isset($error))
                                    <div style="color: red;" class="error-message">
                                        {{ $error }}
                                    </div>
                                @endif

                            <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" />
                            </div>
                            <div class="form-group mb-4">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="***********" />
                            </div>

                            <label class="input-check">
                            Show Password <input type="checkbox" onclick="showPassword()" />
                            <span class="checkmark"></span>
                            </label>

                            <button type="submit" class="btn btn-block login-btn mb-4">Login</button>
                            </form>

                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register.form') }}" class="text-reset">Register here</a></p>
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
