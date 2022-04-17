<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Forgot Password</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/fontawesome-free/css/all.min.css'; ?>">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= ADMIN_ASSETS . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?= base_url(); ?>"><b>Forgot</b>Password</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                    <form action="<?= base_url('recover-password'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email"/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="<?= base_url('admin/login'); ?>"><ion-icon name="arrow-back-outline"></ion-icon> Back to Login</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= ADMIN_ASSETS . 'plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <!-- ion icons -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
