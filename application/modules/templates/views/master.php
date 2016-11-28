<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Teras berita</title>
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
<link href="<?php echo base_url() ?>assets/css-global/custom-red.css" rel="stylesheet" id="style">
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
<!-- preloader start -->
<!-- <div id="preloader">
  <div id="status"></div>
</div> -->
<!-- preloader end -->
<!-- style switcher start -->
<!-- <div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
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
        <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="<?php echo base_url() ?>assets/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
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
                  <li><a href="javascript:void(0)">terasNasional</a></li>
                  <li><a href="javascript:void(0)">terasKriminal</a></li>
                  <li><a href="javascript:void(0)">terasSukabumi</a></li>
                  <li><a href="javascript:void(0)">terasCianjur</a></li>
                  <li><a href="javascript:void(0)">terasSehat</a></li>
                  <li><a href="javascript:void(0)">terasEkonomi</a></li>
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

  <div class="container ">
      <div class="row ">

        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row">
          <!-- berita utama start -->
            <div class="col-sm-16 business">
              <div class="main-title-outer pull-left">
                <div class="main-title">berita utama</div>
              </div>
              <div class="row">
                <div class="col-md-16 col-sm-16">
                  <div class="row">
                    <?php if(!empty($dataBreakingNews)): ?>
                    <div class="col-md-10 col-sm-9 col-xs-16">
                      <div class="topic"> <a href="<?php echo base_url($dataBreakingNews->news_url) ?>"><img class="img-thumbnail" src="<?php echo base_url($dataBreakingNews->news_thumb) ?>" width="600" height="398" alt=""/>
                        <h3><?php echo $dataBreakingNews->news_title ?></h3>
                        <div class="text-danger sub-info-bordered">
                          <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($dataBreakingNews->news_timestamp); ?></div>
                          <!-- <div class="comments"><span class="ion-chatbubbles icon"></span>204</div> -->

                        </div>
                        </a>
                        <p><?php echo $this->format->stripHTMLtags($dataBreakingNews->news_desc2, 0, 100) ?>...</p>
                      </div>
                    </div>
                  <?php endif;  ?>
                    <div class="col-md-6 col-sm-7 col-xs-16">
                    <h2>Berita terkait</h2>
                      <ul class="list-unstyled">
                      <?php foreach($dataBreakingNewsLeft as $rows): ?>
                        <li> <a href="#">
                          <div class="row">
                            <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url($rows->news_thumb) ?>" width="76" height="76" alt=""/> </div>
                            <div class="col-sm-16 col-md-16 col-lg-11">
                              <h4><?php echo $rows->news_title; ?></h4>
                              <div class="text-danger sub-info">
                                <!-- <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                <div class="comments"><span class="ion-chatbubbles icon"></span>351</div> -->

                              </div>
                            </div>
                          </div>
                          </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <!-- berita utama end -->
            <!-- Science & Travel start -->
            <div class="col-sm-16">
              <div class="row">
                <div class="col-xs-16 col-sm-8   science">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">news feed</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-16">
                      <ul class="list-unstyled  top-bordered ex-top-padding">
                      <?php foreach($dataNews as $rows): ?>
                        <li>
                        <a href="#">
                          <div class="row">
                            <div class="col-lg-3 col-md-4 hidden-sm"><img width="76" height="76" alt="" src="<?php echo base_url($rows->news_thumb) ?>" class="img-thumbnail pull-left"> </div>
                            <div class="col-lg-13 col-md-12">
                              <h4><?php echo $rows->news_title?></h4>
                              <div class="text-danger sub-info">
                                <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></div>
                                <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>

                              </div>
                            </div>
                          </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php if($dataIndeph): ?>
                <div class="col-sm-8 col-xs-16">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">teras kejadian perkara</div>
                  </div>
                  <div class="row left-bordered">
                    <div class="topic col-sm-16"> <a href="#"> <img  class="img-thumbnail" src="<?php echo base_url($dataIndeph->news_thumb) ?>" width="600" height="227" alt=""/>
                      <h3><?php echo $dataIndeph->news_title ?></h3>
                      </a>
                      <p> <?php echo $this->format->stripHTMLtags($dataIndeph->news_desc, 0,150) ?></p>
                    </div>
                    <div class="col-sm-16">
                      <ul class="list-unstyled top-bordered ex-top-padding">
                        <?php foreach($dataIndephLeft as $rows): ?>
                        <li> <a href="#">
                          <div class="row">
                            <div class="col-lg-3 col-md-4 hidden-sm "><img width="76" height="76" alt="" src="<?php echo base_url($rows->news_thumb) ?>" class="img-thumbnail pull-left"> </div>
                            <div class="col-lg-13 col-md-12">
                              <h4><?php echo $rows->news_title ?></h4>
                              <div class="text-danger sub-info">
                                <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                <!-- <div class="comments"><span class="ion-chatbubbles icon"></span>351</div> -->

                              </div>
                            </div>
                          </div>
                          </a> </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              </div>
              <hr>
            </div>
            <!-- Scince & Travel end -->

            <!--wide ad start-->
            <div class="col-sm-16  " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?php echo base_url() ?>assets/images/ads/728-90-ad.gif" width="728" height="90" alt=""/></div>
            <!--wide ad end-->

          </div>
        </div>
        <!-- left sec end -->
        <!-- right sec start -->
        <div class="col-sm-5 hidden-xs right-sec">
          <div class="bordered top-margin">
            <div class="row ">
              <!-- activities start -->
              <div class="col-sm-16 bt-space">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified " role="tablist">
                  <li class="active"><a href="#popular" role="tab" data-toggle="tab">teras peristiwa</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="popular">
                    <ul class="list-unstyled">
                      <?php foreach($dataTerasPeristiwa as $key => $rows): ?>
                      <li> <a href="#">
                        <div class="row">
                          <div class="col-sm-5 col-md-4">
                          <h2 class="text-center"><?php echo $key+1 ?></h2>
                          </div>
                          <div class="col-sm-11 col-md-12">
                            <h4><?php echo $rows->fokus_name ?></h4>
                          </div>
                        </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- activities end -->
              <div class="col-sm-16 bt-space">
              <img class="img-responsive" src="<?php echo base_url() ?>assets/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
              <!-- activities start -->
              <div class="col-sm-16 bt-space">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified " role="tablist">
                  <li class="active"><a href="#popular" role="tab" data-toggle="tab">popular</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="popular">
                    <ul class="list-unstyled">
                    <?php foreach($dataPopular as $rows): ?>
                      <li> <a href="#">
                        <div class="row">
                          <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="<?php echo base_url($rows->news_thumb) ?>" width="164" height="152" alt=""/> </div>
                          <div class="col-sm-11 col-md-12">
                            <h4><?php echo $rows->news_title ?></h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></div>
                            </div>
                          </div>
                        </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- activities end -->

            </div>
          </div>
        </div>
        <!-- right sec end -->
      </div>
    </div>
    <div class="container ">
        <div class="row ">

          <!-- left sec start -->
          <div class="col-md-11 col-sm-11">
            <div class="row">
            <!-- berita utama start -->
              <div class="col-sm-16 business">
                <div class="main-title-outer pull-left">
                  <div class="main-title">berita utama</div>
                </div>
                <div class="row">
                  <div class="col-md-16 col-sm-16">
                    <div class="row">
                      <?php if(!empty($dataBreakingNews)): ?>
                      <div class="col-md-10 col-sm-9 col-xs-16">
                        <div class="topic"> <a href="<?php echo base_url($dataBreakingNews->news_url) ?>"><img class="img-thumbnail" src="<?php echo base_url($dataBreakingNews->news_thumb) ?>" width="600" height="398" alt=""/>
                          <h3><?php echo $dataBreakingNews->news_title ?></h3>
                          <div class="text-danger sub-info-bordered">
                            <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($dataBreakingNews->news_timestamp); ?></div>
                            <!-- <div class="comments"><span class="ion-chatbubbles icon"></span>204</div> -->

                          </div>
                          </a>
                          <p><?php echo $this->format->stripHTMLtags($dataBreakingNews->news_desc2, 0, 100) ?>...</p>
                        </div>
                      </div>
                    <?php endif;  ?>
                      <div class="col-md-6 col-sm-7 col-xs-16">
                      <h2>Berita terkait</h2>
                        <ul class="list-unstyled">
                        <?php foreach($dataBreakingNewsLeft as $rows): ?>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?php echo base_url($rows->news_thumb) ?>" width="76" height="76" alt=""/> </div>
                              <div class="col-sm-16 col-md-16 col-lg-11">
                                <h4><?php echo $rows->news_title; ?></h4>
                                <div class="text-danger sub-info">
                                  <!-- <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div> -->

                                </div>
                              </div>
                            </div>
                            </a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
              <!-- berita utama end -->
              <!-- Science & Travel start -->
              <div class="col-sm-16">
                <div class="row">
                  <div class="col-xs-16 col-sm-8   science">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">news feed</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-16">
                        <ul class="list-unstyled  top-bordered ex-top-padding">
                        <?php foreach($dataNews as $rows): ?>
                          <li>
                          <a href="#">
                            <div class="row">
                              <div class="col-lg-3 col-md-4 hidden-sm"><img width="76" height="76" alt="" src="<?php echo base_url($rows->news_thumb) ?>" class="img-thumbnail pull-left"> </div>
                              <div class="col-lg-13 col-md-12">
                                <h4><?php echo $rows->news_title?></h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></div>
                                  <div class="comments"><span class="ion-chatbubbles icon"></span>351</div>

                                </div>
                              </div>
                            </div>
                            </a>
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php if($dataIndeph): ?>
                  <div class="col-sm-8 col-xs-16">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">teras kejadian perkara</div>
                    </div>
                    <div class="row left-bordered">
                      <div class="topic col-sm-16"> <a href="#"> <img  class="img-thumbnail" src="<?php echo base_url($dataIndeph->news_thumb) ?>" width="600" height="227" alt=""/>
                        <h3><?php echo $dataIndeph->news_title ?></h3>
                        </a>
                        <p> <?php echo $this->format->stripHTMLtags($dataIndeph->news_desc, 0,150) ?></p>
                      </div>
                      <div class="col-sm-16">
                        <ul class="list-unstyled top-bordered ex-top-padding">
                          <?php foreach($dataIndephLeft as $rows): ?>
                          <li> <a href="#">
                            <div class="row">
                              <div class="col-lg-3 col-md-4 hidden-sm "><img width="76" height="76" alt="" src="<?php echo base_url($rows->news_thumb) ?>" class="img-thumbnail pull-left"> </div>
                              <div class="col-lg-13 col-md-12">
                                <h4><?php echo $rows->news_title ?></h4>
                                <div class="text-danger sub-info">
                                  <div class="time"><span class="ion-android-data icon"></span>Dec 16 2014</div>
                                  <!-- <div class="comments"><span class="ion-chatbubbles icon"></span>351</div> -->

                                </div>
                              </div>
                            </div>
                            </a> </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                </div>
                <hr>
              </div>
              <!-- Scince & Travel end -->

              <!--wide ad start-->
              <div class="col-sm-16  " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?php echo base_url() ?>assets/images/ads/728-90-ad.gif" width="728" height="90" alt=""/></div>
              <!--wide ad end-->

            </div>
          </div>
          <!-- left sec end -->
          <!-- right sec start -->
          <div class="col-sm-5 hidden-xs right-sec">
            <div class="bordered top-margin">
              <div class="row ">
                <!-- activities start -->
                <div class="col-sm-16 bt-space">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified " role="tablist">
                    <li class="active"><a href="#popular" role="tab" data-toggle="tab">teras peristiwa</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="popular">
                      <ul class="list-unstyled">
                        <?php foreach($dataTerasPeristiwa as $key => $rows): ?>
                        <li> <a href="#">
                          <div class="row">
                            <div class="col-sm-5 col-md-4">
                            <h2 class="text-center"><?php echo $key+1 ?></h2>
                            </div>
                            <div class="col-sm-11 col-md-12">
                              <h4><?php echo $rows->fokus_name ?></h4>
                            </div>
                          </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- activities end -->
                <div class="col-sm-16 bt-space">
                <img class="img-responsive" src="<?php echo base_url() ?>assets/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
                <!-- activities start -->
                <div class="col-sm-16 bt-space">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified " role="tablist">
                    <li class="active"><a href="#popular" role="tab" data-toggle="tab">popular</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="popular">
                      <ul class="list-unstyled">
                      <?php foreach($dataPopular as $rows): ?>
                        <li> <a href="#">
                          <div class="row">
                            <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="<?php echo base_url($rows->news_thumb) ?>" width="164" height="152" alt=""/> </div>
                            <div class="col-sm-11 col-md-12">
                              <h4><?php echo $rows->news_title ?></h4>
                              <div class="text-danger sub-info">
                                <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></div>
                              </div>
                            </div>
                          </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- activities end -->

              </div>
            </div>
          </div>
          <!-- right sec end -->
        </div>
      </div>
