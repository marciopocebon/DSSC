<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DSSC | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>bootstrap/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>bootstrap/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />


</head>

<style>
    body  {
        background-image: url("<?php echo base_url();?>bootstrap/dist/img/IMG_5476.gif");
        background-color: #C64242;
    }
</style>
<body class="login-page" background="IMG_5476.jpg">
<div class="login-box" style="display: none">
    <div class="login-logo">
        <a></a><b>D.S.Sennayaka College </b>Colombo</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?=site_url('loginController/validating'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Name" name="username"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->

            </div>
        </form>

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
        <?php if (isset($error)): ?>
            <div class="row">
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Login Failed!</h4>
                        <strong>Login</strong> failed!.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url();?>bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url();?>bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>bootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.login-box').fadeIn(400);
    });
</script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>