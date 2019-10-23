<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Login</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <input type="hidden" name="redirect" id="redirect" value="<?php echo $redirect?>">
                            <div class="p-5">
                                <div class="text-center"><h1 class="h4 text-gray-900 mb-4">Bienvenid@'s CPANEL!</h1></div>
                                <div class="response"></div>
                                <form class="user" role="form" id="form" method="post" action="<?php echo base_url();?>cp_session/cp_auth" onsubmit="return false;">
                                <div class="form-group"><input type="email" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Usuario..."></div>
                                    <div class="form-group"><input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password..."></div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Recuérdame</label>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                                <div class="text-center"><a class="small" href="javascript:void(0);">Se te olvidó tu contraseña?</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url()?>assets/sb_admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url()?>assets/sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/sb_admin/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url()?>assets/sb_admin/js/auth.js"></script>
</body>
</html>
