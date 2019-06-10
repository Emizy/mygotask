@extends('layouts.admin_master')

@section('title')
    GoServices || Registration
@endsection

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-5">

                <form class="login100-form validate-form">
					<span class="login100-form-title">
						Member Register
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid Username is required">
                        <input class="input100" type="text" name="email" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn btn-primary">
                            Register
                        </button>
                    </div>

                    <div class="text-center pt-2">
						<span class="txt1">
							Forgot
						</span>
                        <a class="txt2" href="forgot.html">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center pt-1">
                        <a class="txt2" href="register.html">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
