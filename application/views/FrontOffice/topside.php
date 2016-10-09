<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($dataArticle)):
    ?>
    <meta property="fb:app_id"        content="199212920500045" />
    <meta property="og:image"         content="<?php echo base_url($dataArticle->news_thumb); ?>" />
    <meta property="og:site_name"     content="terasberita.co"/>
    <meta property="og:description"   content="<?php echo $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100); ?>" />
    <meta property="og:url"           content="<?php echo current_url(); ?>" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?php echo $dataArticle->news_title ?>" />

    <meta name="language" content="id" />
    <meta name="title" content="<?php echo $dataArticle->news_title ?>" />
    <meta name="description" content="<?php echo $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100); ?>" />
    <meta name="keywords" content="<?php echo $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100); ?>" />
    <link rel="image_src" href="<?php echo base_url($dataArticle->news_thumb); ?>"/>
    <meta name="news_keywords" content="<?php echo $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100); ?>" />
    <link rel="canonical" href="<?php echo current_url(); ?>">
    <?php else: ?>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="Indepth Jujur Akurat">
    <meta name="keywords" content="Indepth, jujur, akurat, beita, Berita sukabumi, harian sukabumi, Kriminal sukabumi">
    <?php endif; ?>

    <title>
    <?php
    if(isset($title)):
        echo $this->security->xss_clean($title)." - terasberita.co";
    else:
        echo "terasberita.co - Indepth, Jujur , Akurat";
    endif;
    ?>
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/business-casual.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/myawesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/login-register.css" rel="stylesheet">
    <link rel="icon" type="icon" href="<?php echo base_url() ?>assets/img/logo.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="modal fade login" id="loginModal">
       <div class="modal-dialog login animated">
           <div class="modal-content">
              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Login dengan</h4>
                 </div>
                 <div class="modal-body">
                     <div class="box">
                          <div class="content">
                             <div class="social">
                                 <a id="facebook_login" class="circle facebook" href="<?php echo $this->facebook->login_url(); ?>">
                                     <i class="fa fa-facebook fa-fw"></i>
                                 </a>
                             </div>
                             <div class="division">
                                 <div class="line l"></div>
                                   <span>or</span>
                                 <div class="line r"></div>
                             </div>
                             <div class="error"></div>
                             <div class="form loginBox">
                                 <!-- <form method="post" action="/login" accept-charset="UTF-8"> -->
                                 <?php echo form_open('Auth/checkLoginAjax', array('id' => 'ajaxForm')) ?>
                                 <input id="username" class="form-control" type="text" placeholder="username" name="username">
                                 <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                 <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                 </form>
                             </div>
                          </div>
                     </div>
                     <div class="box">
                         <div class="content registerBox" style="display:none;">
                         <?php echo form_open('Auth/checkLoginAjax', array('id' => 'ajaxForm2')) ?>
                         <div class="error-register"></div>
                          <div class="form">
                             <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                             <input id="full_name" class="form-control" type="text" placeholder="Nama Anda" name="full_name">
                             <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                             <input id="password_confirmation" class="form-control" type="password" placeholder="Ulangi Password" name="password_confirmation">
                             <input class="btn btn-default btn-register" type="button" value="Buat akun" onclick="registerAjax();" name="commit">
                             </div>
                         </div>
                         <?php echo form_close(); ?>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <div class="forgot login-footer">
                         <span>Belum punya akun ?
                              <a href="javascript: showRegisterForm();">Buat akun sekarang</a>
                         ?</span>
                     </div>
                     <div class="forgot register-footer" style="display:none">
                          <span>Sudah punya akun ?</span>
                          <a href="javascript: showLoginForm();">Login</a>
                     </div>
                 </div>
           </div>
       </div>
   </div>
<section id="nav-atas">
    <div class="container">
        <div class="col-md-6">
                <div class="kiri">
                <?php if ($this->session->userdata('logged_in')): ?>
                    <ul>
                        <li>
                            <h5 class="welcome-message">Selamat Datang, <?php echo $this->session->userdata('full_name'); ?>, <a href="<?php echo base_url('Auth/logout/?redirect='.urlencode(current_url())); ?>">Keluar</a></h5>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li>
                            <a href="#">
                                <h5>JADILAH BAGIAN DARI KAMI</h5>
                                <p>Indepth , Jujur dan terpercaya</p>
                            </a>
                        </li>
                        <li class="button">
                            <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"><button class="brown">Masuk</button></a>
                            <!-- <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a> -->
                        </li>
                        <li class="button">
                            <a data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();"><button class="grey">Daftar</button></a>
                        </li>
                    </ul>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="kanan">
                    <div class="col-md-6 col-xs-8">
                        <div class="form">
                            <form action="<?php echo base_url('search'); ?>" id="search-form">
                                <div class="input">
                                    <input placeholder="Cari Berita" name="q" />
                                </div>
                                <div class="cari">
                                    <button><img src="<?php echo base_url() ?>assets/img/search.png" class="cari" width="28px"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="follow">
                                <h6>Follow US :</h6>
                            <ul>
                                <li><a href="http://facebook.com/terasberita.co/"><img src="<?php echo base_url() ?>assets/img/medsos/fb-1.png"></a></li>
                                <li><a href="#"><img src="<?php echo base_url() ?>assets/img/medsos/twit-1.png"></a></li>
                                <li><a href="#"><img src="<?php echo base_url() ?>assets/img/medsos/yutube-1.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="nav-tengah">
    <div class="container">
        <div class="col-md-6">
            <div class="logo">
                <?php if(isset($dataLogo)): ?>
                <a href="#"><img class="img-responsive" src="<?php echo base_url($dataLogo->logo) ?>"></a>
                <?php else: ?>
                <a href="#"><img src="<?php echo base_url('assets/img/logo/Teras Berita - Logo - Standart.png') ?>"></a>
                <?php endif; ?>
            </div>
        </div>
                <?php
                $ads = $this->news->getData('fn_layout', 'layout_name, layout_type, layout_dir', array('layout_type' => 'ads'));
                foreach ($ads as $key => $value) {
                    # code...
                    $data[$value->layout_name] = $value->layout_dir;
                }
                ?>
        <div class="col-md-6">
            <div class="iklan hidden-xs">
                <a href="#"><img src="<?php echo base_url($data['header-809x188']) ?>"></a>
            </div>
        </div>
    </div>
</section>


    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html"> teras Berita</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="navigasi">
                    <li>
                        <a id="<?php if($this->uri->segment(1) == 'teras-nasional'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-nasional') ?>">terasNasional</a>
                    </li>
                    <li>
                        <a id="<?php if($this->uri->segment(1) == 'teras-kriminal'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-kriminal') ?>">terasKriminal</a>
                    </li>
                    <li>
                        <a id = "<?php if($this->uri->segment(1) == 'teras-sukabumi'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-sukabumi') ?>">terasSukabumi</a>
                    </li>
                    <li>
                        <a id="<?php if($this->uri->segment(1) == 'teras-cianjur'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-cianjur') ?>">terasCianjur</a>
                    </li>
                    <li>
                        <a id="<?php if($this->uri->segment(1) == 'teras-sehat'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-sehat') ?>">terasSehat</a>
                    </li>
                    <li>
                        <a id="<?php if($this->uri->segment(1) == 'teras-ekonomi'): echo 'aktiv'; endif; ?>" href="<?php echo base_url('teras-ekonomi') ?>">terasEkonomi</a>
                    </li>
                    <li class="index">
                        <a href="#" style="margin-right: 0px;">INDEX</a>
                    </li>
                </ul>
            </div>
        </div>
            <!-- /.navbar-collapse -->
    </div>
        <!-- /.container -->
    </nav>
<section id="responsive-nav" class="visible-xs">
  <div class="menu-mobile">
    <div class="container cokelat">
        <a href="<?php echo base_url('fokus'); ?>">Fokus</a>
        <a href="<?php echo base_url('populer'); ?>">Terpopuler</a>
        <a href="<?php echo base_url('arsip'); ?>">Indeks</a>
        <div class="clearfix"></div>
    </div>
  </div>
</section>
