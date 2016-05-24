<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->lang->line('site_title'); ?></title>

    <!-- Global stylesheets -->
    <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/login.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>assets/img/robopace_logo_w.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#">
                    <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="visible-xs-inline-block position-right"> Options</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="index.html">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('mail_address'); ?>">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('password'); ?>">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" checked="checked">
                                        <?php echo $this->lang->line('remember'); ?>
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <a href="login_password_recover.html"><?php echo $this->lang->line('forgot_password'); ?></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>

                        <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
                        <ul class="list-inline form-group list-inline-condensed text-center">
                            <li><a href="<?php echo site_url("social/session/facebook") ?>?referer=user" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                            <li><a href="<?php echo site_url("social/session/google") ?>?referer=user" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-google"></i></a></li>
                        </ul>

                        <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                        <a href="login_registration.html" class="btn btn-default btn-block content-group"><?php echo $this->lang->line('Kayıt Ol'); ?></a>
                        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                    </div>
                </form>
                <!-- /advanced login -->


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2016 RoboPace Education Technologies Inc.
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<?php print_r($this->session->flashdata()); ?>
</body>
</html>
