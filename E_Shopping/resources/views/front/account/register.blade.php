@extends('front.layout.master')
@section('title', 'Register')
@section('body')
    <!-- Code here -->
    <!-- Breadcrumb Section Begin --dieu huong dinh vi vi tri-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
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
                    <div class="register-form">
                        <h2>Register</h2>
                        @if (session('notification'))
                            <div class="alert alert-waring">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="group-input">
                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="pass" required>
                            </div> 
                            <div class="group-input">
                                <label for="conf-pass">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="password_cofirmation" id="conf-pass" required>
                            </div>               
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Section End -->
    <!-- Code here -->
@endsection
