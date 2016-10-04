<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/custom2.css'); ?>" rel="stylesheet">
    </head>
    <body class="nav-md">
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
	<!-- Bootstrap -->
        <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <div class="container body">
            <div class="main_container">
                <input type="hidden" value="<?php echo base_url() . 'backoffice/'. $this->session->userdata('page'); ?>" id="thepage"></input>
                <?php include('leftside.php'); ?>
                <!-- top navigation -->
                <?php include('topbar.php'); ?>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                <?php echo $thepage; ?>
                </div>

                <!-- /page content -->
                <!-- footer content -->
                <?php include('footer.php'); ?>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->

        
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url('assets/./vendors/nprogress/nprogress.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/custom-back.js'); ?>">
       </script>

        <!-- /gauge.js -->
    </body>
</html>
