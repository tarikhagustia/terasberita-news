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