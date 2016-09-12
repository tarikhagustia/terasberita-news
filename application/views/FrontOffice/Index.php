<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Terasberita - Home</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- bootstrap styles-->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- google font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
  <!-- ionicons font -->
  <link href="<?php echo base_url() ?>assets/css/ionicons.min.css" rel="stylesheet">
  <!-- animation styles -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css" />
  <!-- custom styles -->
  <link href="<?php echo base_url() ?>assets/css/custom-red.css" rel="stylesheet" id="style">
  <!-- owl carousel styles-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.transitions.css">
  <!-- magnific popup styles -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
  <!-- My Custom  -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- preloader start -->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- preloader end -->
    <!-- style switcher start -->
   <!--  <div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
      <div id="switcher">
        <ul class="colors-list">
          <li><a href="#" class="red" id="custom-red"></a></li>
          <li><a href="#" class="green" id="custom-green"></a></li>
          <li><a href="#" class="purple" id="custom-purple"></a></li>
          <li><a href="#" class="blue" id="custom-blue"></a></li>
        </ul>
      </div>
    </div> -->
    <!-- style switcher end -->
    <!-- wrapper start -->
    <div class="wrapper">
      <!-- header toolbar start -->
      <div class="header-toolbar green-header">
        <div class="container">
          <div class="row">
            <div class="col-md-16 text-uppercase">
              <div class="row">
                <div class="col-sm-8 col-xs-16">
                  <ul id="inline-popups" class="list-inline green-header">
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
            <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="index-2.html">terasberita</a></div>
            <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="<?php echo base_url() ?>assets/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
          </div>
        </div>
        <!-- header end -->
        <!-- nav and search start -->
        <div class="nav-search-outer">
          <!-- nav start -->

          <nav class="navbar navbar-inverse navbar-coco" role="navigation">
            <div class="container">
              <div class="row">
                <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  </div>
                  <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav text-uppercase main-nav ">
                      <li class="active"><a href="index-2.html">home</a></li>
                      <li> <a href="javascript:void(0)">business</a></li>
                      <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">lifestyle<span class="ion-ios7-arrow-down nav-icn"></span></a>
                        <ul class="dropdown-menu text-capitalize mega-menu" role="menu">
                          <li>
                            <div class="row">
                              <div class="col-sm-16">
                                <div class="row">
                                  <div class="col-xs-16 col-sm-16 col-md-6 col-lg-6">
                                    <ul class="mega-sub">
                                      <li><a href="#"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Home Decoration<span class="badge pull-right">Featured</span></a> </li>
                                      <li><a href="#"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Handbags &amp; Shoes</a> </li>
                                      <li><a href="#"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Furnishings &amp; Homeware<span class="badge pull-right">New</span></a> </li>
                                      <li><a href="#"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Beauty &amp; Fashion</a> </li>
                                    </ul>
                                  </div>
                                  <div class="col-sm-10 mega-sub-topics hidden-sm hidden-xs">
                                    <div class="row">
                                      <div class="col-sm-8">
                                        <div class="vid-thumb">
                                          <h4>Buying a home: is it worth paying for a Homebuyer Report?</h4>
                                          <a class="popup-youtube" href="https://www.youtube.com/watch?v=TEnNaUg6Vm4">
                                            <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-2.jpg" width="300" height="132" alt=""/> </div>
                                          </a> </div>
                                        </div>
                                        <div class="col-sm-8">
                                          <div class="sub-topic-thumb">
                                            <h4>Sugar-free chocolate recipes: dark chocolate</h4>
                                            <a href="#">
                                              <div class="sub-box"><img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-1.jpg" width="300" height="132" alt=""/> </div>
                                            </a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li> <a href="javascript:void(0)">science</a></li>
                          <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">politics<span class="ion-ios7-arrow-down nav-icn"></span></a>
                            <ul class="dropdown-menu text-capitalize" role="menu">
                              <li><a href="javascript:void(0)"><span class="ion-ios7-arrow-right nav-sub-icn"></span>World News</a></li>
                              <li><a href="javascript:void(0)"><span class="ion-ios7-arrow-right nav-sub-icn"></span>U.S.</a></li>
                              <li><a href="javascript:void(0)"><span class="ion-ios7-arrow-right nav-sub-icn"></span>AFRICA</a></li>
                              <li><a href="javascript:void(0)"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Arabian Gulf</a></li>
                              <li><a href="javascript:void(0)"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Topics and Issues</a></li>
                            </ul>
                          </li>
                          <li><a href="javascript:void(0)">sport</a></li>
                          <li><a href="javascript:void(0)" >travel</a></li>
                          <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="ion-ios7-arrow-down nav-icn"></span></a>
                            <ul class="dropdown-menu text-capitalize" role="menu">
                              <li><a href="index-2.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Home 1</a></li>
                              <li><a href="index-3.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Home 2</a></li>
                              <li><a href="sections-page-style-1.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>sections page style 1</a></li>
                              <li><a href="sections-page-style-2.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>sections page style 2</a></li>
                              <li><a href="section-topic-details.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>section topic details</a></li>
                              <li><a href="404.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>404</a></li>
                              <li><a href="gallery.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>Gallery</a></li>
                              <li><a href="author-page.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>author page</a></li>
                              <li><a href="contact-us.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>contact us</a></li>
                              <li><a href="search-result-found.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>search result found</a></li>
                              <li><a href="search-result-not-found.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>search result not found</a></li>
                              <li><a href="faqs.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>FAQ's</a></li>
                            </ul>
                          </li>
                          <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">blog<span class="ion-ios7-arrow-down nav-icn"></span></a>
                            <ul class="dropdown-menu text-capitalize" role="menu">
                              <li><a href="blog-masonry.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>blog masonry</a></li>
                              <li><a href="post-item-details.html"><span class="ion-ios7-arrow-right nav-sub-icn"></span>post item details</a></li>
                            </ul>
                          </li>
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
          <div class="container">
            <div class="row">
            </div>
          </div>
          <!-- top sec end -->
          <!-- data start -->
          <div class="container ">
            <div class="row ">
              <!-- left sec start -->
              <div class="col-md-11 col-sm-11">
                <div class="row">
                  <!-- business start -->
                  <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">business</div>
                      <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                    </div>
                    <div class="row">
                      <div class="col-md-11 col-sm-16">
                        <div class="row">
                          <div class="col-md-8 col-sm-9 col-xs-16">
                            <div class="topic"> <a href="#"><img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/business/business-main.jpg" width="600" height="398" alt=""/>
                              <h3>Famous artist share his tracks for free</h3>
                              <div class="text-danger sub-info-bordered">
                                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                              </div>
                            </a>
                            <p>Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                          </div>
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-16">
                          <ul class="list-unstyled">
                            <li> <a href="#">
                              <div class="row">
                                <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-1.jpg" width="76" height="76" alt=""/> </div>
                                <div class="col-sm-16 col-md-16 col-lg-11">
                                  <h4>Irish cream and chocolate
                                    cheesecake </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-2.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>Nielsen forecasts smaller black friday </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-3.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>Nielsen forecasts smaller black friday </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-4.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>The evolution of the apple mouse</h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
                        <div id="vid-thumbs" class="owl-carousel">
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a class="popup-youtube" href="https://www.youtube.com/watch?v=TEnNaUg6Vm4">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a class="popup-youtube" href="http://vimeo.com/7396421">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>

                </div>
              </div>
              <!-- left sec end -->
              <!-- right sec start -->
              <div class="col-sm-5 hidden-xs right-sec">
                <div class="row">
                  <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">business</div>
                      <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                    </div>
                    <div class="row ">
                      <!-- activities start -->
                      <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130">


                        <!-- Tab panes -->
                        <ul class="list-unstyled">
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-1.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>Tellus. Phasellus viverra nulla ut metus</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-2.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-3.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-4.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-5.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                        </ul>
                      </div>
                      <!-- activities end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- right sec end -->
            </div>
          </div>

          <div class="container">
            <div class="row">
              <!-- left sec start -->
              <div class="col-md-9 col-sm-9">
                <div class="row">
                  <!-- business start -->
                  <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">business</div>
                      <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                    </div>
                    <div class="row">
                      <div class="col-md-11 col-sm-16">
                        <div class="row">
                          <div class="col-md-8 col-sm-9 col-xs-16">
                            <div class="topic"> <a href="#"><img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/business/business-main.jpg" width="600" height="398" alt=""/>
                              <h3>Famous artist share his tracks for free</h3>
                              <div class="text-danger sub-info-bordered">
                                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                              </div>
                            </a>
                            <p>Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                          </div>
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-16">
                          <ul class="list-unstyled">
                            <li> <a href="#">
                              <div class="row">
                                <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-1.jpg" width="76" height="76" alt=""/> </div>
                                <div class="col-sm-16 col-md-16 col-lg-11">
                                  <h4>Irish cream and chocolate
                                    cheesecake </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-2.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>Nielsen forecasts smaller black friday </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-3.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>Nielsen forecasts smaller black friday </h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                              <li> <a href="#">
                                <div class="row">
                                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/business/business-th-4.jpg" width="76" height="76" alt=""/> </div>
                                  <div class="col-sm-16 col-md-16 col-lg-11">
                                    <h4>The evolution of the apple mouse</h4>
                                    <div class="text-danger sub-info">
                                      <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                      <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                    </div>
                                  </div>
                                </div>
                              </a> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
                        <div id="vid-thumbs" class="owl-carousel">
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a class="popup-youtube" href="https://www.youtube.com/watch?v=TEnNaUg6Vm4">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a class="popup-youtube" href="http://vimeo.com/7396421">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Perspiciatis unde omnis iste natus</h4>
                              </a> </div>
                              <div class="vid-thumb"><a href="#">
                                <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?php echo base_url() ?>assets/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                                <h4>Cras tincidunt enim non metus ultricies.</h4>
                              </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
              <!-- left sec end -->
              <!-- right sec start -->
              <div class="col-sm-7 hidden-xs right-sec">
                <div class="row">
                  <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">business</div>
                      <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                    </div>
                    <div class="row ">
                      <!-- activities start -->
                      <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130">


                        <!-- Tab panes -->
                        <ul class="list-unstyled">
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-1.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>Tellus. Phasellus viverra nulla ut metus</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-2.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-3.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-4.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="<?php echo base_url() ?>assets/images/popular/pop-5.jpg" width="164" height="152" alt=""/> </div>
                              <div class="col-sm-11 col-md-12">
                                <h4>The evolution of the apple ..</h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>
                                  <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                                </div>
                              </div>
                            </div>
                          </a> </li>
                        </ul>
                      </div>
                      <!-- activities end -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- right sec end -->
            </div>
          </div>
          <!-- data end -->
          <footer>
             <div class="btm-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-16">
            <div class="row">
              <div class="col-sm-10 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">
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
              <div class="col-sm-6 col-xs-16 copyrights text-right wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">© 2014 terasberita THEME - ALL RIGHTS RESERVED</div>
            </div>
          </div>
          <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
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
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <!--jQuery easing-->
        <script src="<?php echo base_url() ?>assets/js/jquery.easing.1.3.js"></script>
        <!-- bootstrab js -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
        <!--style switcher-->
        <script src="<?php echo base_url() ?>assets/js/style-switcher.js"></script> <!--wow animation-->
        <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
        <!-- time and date -->
        <script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
        <!--news ticker-->
        <script src="<?php echo base_url() ?>assets/js/jquery.ticker.js"></script>
        <!-- owl carousel -->
        <script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>
        <!-- magnific popup -->
        <script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.js"></script>
        <!-- weather -->
        <script src="<?php echo base_url() ?>assets/js/jquery.simpleWeather.min.js"></script>
        <!-- calendar-->
        <script src="<?php echo base_url() ?>assets/js/jquery.pickmeup.js"></script>
        <!-- go to top -->
        <script src="<?php echo base_url() ?>assets/js/jquery.scrollUp.js"></script>
        <!-- scroll bar -->
        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.plus.js"></script>
        <!--masonry-->
        <script src="<?php echo base_url() ?>assets/js/masonry.pkgd.js"></script>
        <!--media queries to js-->
        <script src="<?php echo base_url() ?>assets/js/enquire.js"></script>
        <!--custom functions-->
        <script src="<?php echo base_url() ?>assets/js/custom-fun.js"></script>
      </body>
      
      </html>