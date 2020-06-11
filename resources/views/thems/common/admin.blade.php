<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-hidden-toggle/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 08:18:15 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Serein Admin</title>
    <!-- plugins:css -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{assets('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{assets('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{assets('vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{assets('css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{assets('images/favicon.png')}}"/>

    <link href="{{assets('css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
</head>

<body class="sidebar-toggle-display sidebar-hidden">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="http://www.urbanui.com/serein/template/images/logo.svg" alt="logo">
                        </div>
                        {{--                        <h4>Welcome back!</h4>--}}
                        {{--                        <h6 class="font-weight-light">Happy to see you again!</h6>--}}
                        <form class="pt-3" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg border-left-0"
                                           id="exampleInputEmail" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="password" name="password"
                                           class="form-control form-control-lg border-left-0" id="exampleInputPassword"
                                           placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="my-3">
                                <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN
                                </button>
                            </div>

                            {{--                            <div class="text-center mt-4 font-weight-light">--}}
                            {{--                                Don't have an account? <a href="register-2.html" class="text-primary">Create</a>--}}
                            {{--                            </div>--}}
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018
                        All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{assets('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{assets('vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{assets('js/off-canvas.js')}}"></script>
<script src="{{assets('js/hoverable-collapse.js')}}"></script>
<script src="{{assets('js/template.js')}}"></script>
<script src="{{assets('js/settings.js')}}"></script>
<script src="{{assets('js/todolist.js')}}"></script>
<!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-hidden-toggle/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 08:18:15 GMT -->
</html>
