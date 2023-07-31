@extends('front.layout.master')
@section('title','Login')
@section('body')
    <!-- Code here -->
    <!-- Breadcrumb Section Begin --dieu huong dinh vi vi tri-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Login Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        @if (session('notification'))
                            <div class="alert alert-waring">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass" required>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" name="remember" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forgot Your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register.html" class="or-login">Or Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Section End -->
    <!-- Code here -->

@endsection
   