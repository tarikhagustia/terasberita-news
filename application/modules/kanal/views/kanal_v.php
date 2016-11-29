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
              <div class="col-md-10 col-sm-9 col-xs-16">
                <!-- Start of breaking news -->
                <?php echo modules::run('berita/get_breaking'); ?>
                <!-- end of breaking news -->
              </div>
              <div class="col-md-6 col-sm-7 col-xs-16">
              <h2>Berita terkait</h2>
              <!-- start of berita terkait -->
              <?php echo modules::run('berita/get_breaking_terkait') ?>
              <!-- end of berita terkait -->
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
                  <?php echo modules::run('berita/get_feeds') ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-8 col-xs-16">
            <div class="main-title-outer pull-left">
              <div class="main-title">teras kejadian perkara</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
            </div>
            <div class="row left-bordered">
            <!-- start of teras tkp -->
            <?php echo modules::run('berita/get_tkp') ?>
            <!-- end of teras tkp -->
            </div>
          </div>
        </div>
        <hr>
      </div>
      <!-- Scince & Travel end -->
      <!--wide ad start-->
      <div class="col-sm-16  " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?= base_url() ?>/assets/images/ads/728-90-ad.gif" width="728" height="90" alt=""/></div>
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
                <!-- start of peristiwa -->
                <?php echo modules::run('berita/get_peristiwa') ?>
                <!-- end of peristiwa -->
              </ul>
            </div>
          </div>
        </div>
        <!-- activities end -->
        <div class="col-sm-16 bt-space">
        <img class="img-responsive" src="<?= base_url() ?>/assets/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
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
                <!-- start of pupular -->
                <?php echo modules::run('berita/get_popular') ?>
                <!-- end of popular -->
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
