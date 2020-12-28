<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{('assets/user/login/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-26">
                    </span>
                    <span class="login100-form-title p-b-48">
                        <img src="https://avatars0.githubusercontent.com/u/4692034?s=200&v=4">
                    </span>
                    @php
					$loginData = session()->get('loginData');
                    $code = session()->pull('code');
                    $msg = session()->pull('msg');
                    var_dump($code);
                    @endphp
                    @if($code== null)
                    <p>Chào mừng bạn đến với Petlove. Mời bạn đăng nhập để sử dụng đầy đủ tính năng!</p>
                    @elseif($code == 1)
                    <p>
                        <div class="alert alert-success">
                            {{$msg}}
                        </div>
                    </p>
					@elseif($code == 0)
                    <p>
                        <div class="alert alert-danger">
                            {{$msg}}
                        </div>
                    </p>
					@elseif($code == 2)
                    <p>
                        <div class="alert alert-info">
                            {{$msg}}
                        </div>
                    </p>
                    @endif
                    {{-- <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div> --}}

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <a href="{{route('login.facebook')}}" class="login100-form-btn">
                                <i class="fab fa-facebook mr-2"></i>Đăng nhập với Facebook
                            </a>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Đường dây nóng
                        </span>

                        <a class="txt2" href="#">
                            0347539143
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{('assets/user/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{('assets/user/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('assets/user/login/js/main.js')}}"></script>

</body>
</html>
