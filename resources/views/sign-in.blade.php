@extends('layouts.app')
@section('title', 'Sign In')
@section('content')
    <!--============= Sign In Section Starts Here =============-->
    <div class="account-section bg_img" data-background="/public/images/account-bg.jpg">
        <div class="container">
            <div class="account-title text-center">
                <a href="/" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span
                            class="d-none d-sm-inline-block">To Cortaly</span></span></a>
                <a href="/" class="logo">
                    <img src="/public/images/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="account-wrapper">
                <div class="account-body">
                    <h4 class="title mb-20">Welcome To Cortaly</h4>
                    <form class="account-form">
                        <div class="form-group">
                            <label for="sign-up">Your Email </label>
                            <input type="text" placeholder="Enter Your Email " id="sign-up">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="text" placeholder="Enter Your Password" id="pass">
                            <span class="sign-in-recovery">Forgot your password? <a href="sign-in.html#0">recover
                                    password</a></span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="mt-2 mb-2">Sign In</button>
                        </div>
                    </form>
                </div>
                <div class="or">
                    <span>OR</span>
                </div>
                <div class="account-header pb-0">
                    <span class="d-block mb-30 mt-2">Sign up with your work email</span>
                    <a href="sign-in.html#0" class="sign-in-with"><img src="/public/images/icon/google.png"
                            alt="icon"><span>Sign Up with Google</span></a>
                    <span class="d-block mt-15">Don't have an account? <a href="sign-up.html">Sign Up Here</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--============= Sign In Section Ends Here =============-->
@endsection
