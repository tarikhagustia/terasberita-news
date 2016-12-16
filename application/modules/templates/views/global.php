<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
echo modules::run('meta/show', is_article(), article_url());
echo $meta_title = (isset($meta_title)) ? "<title> " . $meta_title .  " - terasberita.co</title>" : "<title>terasberita.co - Indepth, Jujur , Akurat</title>";
?>

<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="<?php echo base_url() ?>assets/image/x-icon">
<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="<?php echo base_url() ?>assets/image/x-icon">
<!-- bootstrap styles-->
<link href="<?php echo base_url() ?>assets/css-global/bootstrap.min.css" rel="stylesheet">
<!-- google font -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'> -->
<!-- ionicons font -->
<link href="<?php echo base_url() ?>assets/css-global/ionicons.min.css" rel="stylesheet">
<!-- animation styles -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css-global/animate.css" />
<!-- custom styles -->
<link href="<?php echo base_url() ?>assets/css/custom-red.css" rel="stylesheet" id="style">
<!-- teras style -->
<link href="<?php echo base_url() ?>assets/css/teras.css" rel="stylesheet" />
<!-- owl carousel styles-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css-global/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css-global/owl.transitions.css">
<!-- magnific popup styles -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css-global/magnific-popup.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
  <!-- header toolbar start -->
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
                <li class="hidden-xs"><a href="#">advertisement</a></li>
                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">log in</a></li>
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                <li><a  href="#">About</a></li>
              </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end -->

  <!-- sticky header start -->
  <div class="sticky-header">
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5"><a class="navbar-brand" href="index-2.html">globalnews</a></div>
        <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="<?= base_url() ?>/assets/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
      </div>
    </div>
    <!-- header end -->
    <!-- nav and search start -->
    <div class="nav-search-outer">
      <!-- nav start -->

      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav main-nav ">
                  <!-- <li class="active"><a href="javascript:void(0)">business</a></li> -->
                  <li><a href="javascript:void(0)">Home</a></li>
                  <li><a href="javascript:void(0)">terasNasional</a></li>
                  <li><a href="javascript:void(0)">terasNusantara</a></li>
                  <li><a href="javascript:void(0)">terasHuKrim</a></li>
                  <li><a href="javascript:void(0)">Sosok</a></li>
                  <li><a href="javascript:void(0)">Wisata / Kuliner</a></li>
                  <li><a href="javascript:void(0)">terasTKP</a></li>
                  <li><a href="javascript:void(0)">terasOtonomi</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- nav end -->
        <!-- search start -->

        <div class="search-container ">
          <div class="container">
            <form action="#" method="" role="search">
              <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">
            </form>
          </div>
        </div>
        <!-- search end -->
      </nav>
      <!--nav end-->
    </div>
    <!-- nav and search end-->
  </div>
  <!-- sticky header end -->
  <!-- top sec start -->

  <div class="container" id="fixedscrool">
    <!-- Start of view -->
    <?php $this->load->view($content); ?>
    <!-- end of view -->
  </div>
  <footer>
    <div class="btm-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-16">
            <div class="row">
              <div class="col-sm-10 col-xs-16 f-nav " >
                <ul class="list-inline ">
                  <li> <a href="#"> Home </a> </li>
                  <li> <a href="#"> Business </a> </li>
                  <li> <a href="#"> Science </a> </li>
                  <li> <a href="#"> Lifestyle </a> </li>
                  <li> <a href="#"> Politics </a> </li>
                  <li> <a href="#"> Sport </a> </li>
                  <li> <a href="#">short codes</a> </li>
                  <li> <a href="#"> Contact </a> </li>
                </ul>
              </div>
              <div class="col-sm-6 col-xs-16 copyrights text-right " >© 2016 terasberita.co</div>
            </div>
          </div>
          <div class="col-sm-16 f-social  ">
            <ul class="list-inline">
              <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>
              <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>
              <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end -->
  <div id="create-account" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Create Account</h3>
      <hr>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Display Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Register" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
  <div id="log-in" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Log In Your Account</h3>
      <hr>
      <div class="form-group">
        <input type="text" name="access_name" id="access_name" class="form-control" placeholder="Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="4">
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Log In" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- wrapper end -->

<!-- jQuery -->
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<!--jQuery easing-->
<script src="<?= base_url() ?>/assets/js/jquery.easing.1.3.js"></script>
<!-- bootstrab js -->
<script src="<?= base_url() ?>/assets/js/bootstrap.js"></script>
<!--style switcher-->
<script src="<?= base_url() ?>/assets/js/style-switcher.js"></script> <!--wow animation-->
<script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
<!-- time and date -->
<script src="<?= base_url() ?>/assets/js/moment.min.js"></script>
<!--news ticker-->
<script src="<?= base_url() ?>/assets/js/jquery.ticker.js"></script>
<!-- owl carousel -->
<script src="<?= base_url() ?>/assets/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="<?= base_url() ?>/assets/js/jquery.magnific-popup.js"></script>
<!-- weather -->
<script src="<?= base_url() ?>/assets/js/jquery.simpleWeather.min.js"></script>
<!-- calendar-->
<script src="<?= base_url() ?>/assets/js/jquery.pickmeup.js"></script>
<!-- go to top -->
<script src="<?= base_url() ?>/assets/js/jquery.scrollUp.js"></script>
<!-- scroll bar -->
<script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.nicescroll.plus.js"></script>
<!--masonry-->
<script src="<?= base_url() ?>/assets/js/masonry.pkgd.js"></script>
<!--media queries to js-->
<script src="<?= base_url() ?>/assets/js/enquire.js"></script>
<!--custom functions-->
<script src="<?= base_url() ?>/assets/js/custom-fun.js"></script>
<?php echo put_headers(); ?>
</body>

</html>
