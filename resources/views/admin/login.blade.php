<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $title }} </title>

    <!-- base:css -->
    <link rel="stylesheet" href="{{URL('public/admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{URL('public/admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{URL('public/admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{URL('public/admin/images/My-Books-2.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{{URL('public/users/img/My-Books-2.ico')}}" width="100" height="100"
                                    alt="logo">
                                <h4> BOOK WEBSITE </h4>
                            </div>

                            @include('admin.alert')
                            <form class="pt-3" action="{{URL::to('/admin/login/store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="admin_email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="admin_password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Mật khẩu">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        ĐĂNG NHẬP </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{URL('public/admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{URL('public/admin/js/off-canvas.js')}}"></script>
    <script src="{{URL('public/admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{URL('public/admin/js/template.js')}}"></script>
    <script src="{{URL('public/admin/js/settings.js')}}"></script>
    <script src="{{URL('public/admin/js/todolist.js')}}"></script>
    <!-- endinject -->
</body>

</html>