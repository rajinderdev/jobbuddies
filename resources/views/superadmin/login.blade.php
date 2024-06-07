@extends('superadmin.login-layout.master')

@section('main-content-section')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content ">
        <!-- <div class="layoutAuthentication_bg-half"></div> -->
        <div class="container px-lg-4">
            <div class="row justify-content-center align-items-center" id="layoutAuthentication-row">
                <div class="col-md-8 col-lg-4">
                    <!-- Basic login form-->
                    <div class="card layoutAuthentication-card shadow border-0 rounded-3">
                        <div
                            class="card-header p-lg-4 bg-transparent justify-content-center text-center login-logo">
                            <img src="{{ asset('assets/frontend/images/logo.png') }}" class="img-fluid" alt="logo">
                        </div>
                        <div class="card-header justify-content-center">
                            <h4 class="fw-bold text-center mb-0">Login</h4>
                        </div>
                        <div class="card-body p-lg-4">
                            <div class="profile-img">
                                <figure>
                                    <img src="{{ asset('assets/imgs/login-profile.png') }}" class="img-fluid" alt="image">
                                </figure>
                            </div>
                            <!-- Login form-->
                            <form id="loggedIn-form" action="{{ route('superadmin.login') }}" method="POST" class="w-100">
                            @csrf
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                        placeholder="Enter email address">
                                </div>
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label class="mb-1" for="inputPassword">Password</label>
                                    <input class="form-control" id="inputPassword" name="password" type="password"
                                        placeholder="Enter password">
                                </div>
                                <!-- Form Group (remember password checkbox)-->
                                <!-- <div class="forgot-password mb-3 d-flex align-items-center justify-content-between">
                                    <div class="forgot-checkbox">
                                        <input class="form-check-input mt-0" id="rememberPasswordCheck"
                                            type="checkbox" value="">
                                        <label class="form-check-label" for="rememberPasswordCheck">Remember
                                            Password</label>
                                    </div>
                                    <a class="d-inline-block " href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <!-- Form Group (login box)-->
                                <div class="d-flex align-items-center justify-content-center w-100 mt-4 mb-0">
                                    <button type="submit" class="btn btn-danger d-block">Login</button>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="card-footer p-lg-4 text-center bg-transparent">
                            <div class="new-account-link">
                                Don’t have an account?
                                <a class="d-inline-block " href="register.html">Sign up!</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection