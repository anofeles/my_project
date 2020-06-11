<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-hidden-toggle/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 08:18:15 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Serein Admin</title>
    <!-- plugins:css -->
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
                            <a href="{{route('admin')}}">
                                <img src="http://www.urbanui.com/serein/template/images/logo.svg" alt="logo">
                            </a>
                        </div>
                        {{--                        <h4>New here?</h4>--}}
                        {{--                        <h6 class="font-weight-light">Join us today! It takes only few steps</h6>--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="pt-3" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="text" name="name" class="form-control form-control-lg border-left-0"
                                           placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>last name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="text" name="lname" class="form-control form-control-lg border-left-0"
                                           placeholder="last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="text" name="user" class="form-control form-control-lg border-left-0"
                                           placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-email-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="email" name="email"
                                           class="@error('title') is-invalid @enderror form-control form-control-lg border-left-0"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <input type="password" name="pass"
                                           class="form-control form-control-lg border-left-0"
                                           id="exampleInputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                      <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                      </span>
                                    </div>
                                    <select name="status" class="form-control form-control-lg">
                                        @if($user->status == 1)
                                            <option value="2">ადმინი</option>
                                            <option value="3">მომხმარებელი</option>
                                        @elseif($user->status == 2)
                                            <option value="3">მომხმარებელი</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            @if(isset($pas))
                                <h3>რეგისტრაცია წამატებით დასრულდა</h3>
                            @endif
                            <div class="mt-3">
                                <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP
                                </button>
                                {{--<a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#"></a>--}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018
                        All rights reserved.</p>btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn
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


<!-- Mirrored from www.urbanui.com/serein/template/demo/vertical-hidden-toggle/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 08:18:15 GMT -->
</html>
