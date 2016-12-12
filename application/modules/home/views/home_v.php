<div class="row" id="FixedDiv">
  <div class="col-sm-9">
    <?php echo modules::run('berita/get_breaking') ?>
  </div>
  <div class="col-sm-7">
    <div class="main-title full" style="margin-bottom: 2px;">AKTUALITAS</div>
    <div class="bordered" id="aktualitas">
      <img src="<?php echo base_url() ?>assets/images/business/business-main.jpg" alt=""  class="img-responsive"/>
      <h4>Pesawat milik TNI AL Terpeleset di</h4>
      <p>
        Sukabumi, Pesawat terpeleset di bla bla bla bla
      </p>
    </div>
  </div>
  <hr/>
</div>
<div class="row">
  <div class="col-sm-5" >
      <img src="<?php echo base_url() ?>assets/images/ads/336-280-ad.gif" class="img-responsive" width="100%"/>
      <div class="batas"></div>
      <div class="main-title full">apa kata mereka</div>
      <div class="bordered" id="mereka">
        <ul class="list-unstyled">
          <?php echo modules::run('berita/get_peoplesay') ?>
        </ul>
      </div>

  </div>
  <div class="col-sm-5">
    <div class="">
      <h3 class="main-title-dash"><span>NEWS FEED</span></h3>
      <div class="bordered" style="overflow-y: auto; height:800px;" id="">
        <ul class="list-unstyled">
          <?php echo modules::run('berita/get_feeds'); ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="main-title full" style="margin-bottom: 2px;">teras kejadian perkara</div>
    <div class="bordered" id="teraskejadianperkara">
      <?php echo modules::run('berita/get_tkp') ?>
    </div>
    <div class="row">
      <div class="col-sm-16">
        <div class="">
          <div class="main-title full" style="margin-bottom: 2px;">Popular News</div>
          <div class="bordered">
            <ul class="list-unstyled  top-bordered ex-top-padding">
              <?php echo modules::run('berita/get_popular') ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" style="margin-top: 10px;">
  <div class="col-sm-5">
    <img src="<?php echo base_url() ?>assets/images/ads/320x550.png" alt="" class="img-responsive"/>
  </div>
  <div class="col-sm-11">
    <div class="row">
      <div class="col-sm-8">
        <img  width="100%" class="img-responsive" width="100%" src="<?php echo base_url() ?>assets/images/general/teras-penelusuran.png" alt="" />
        <div class="batas"></div>
        <div class="bordered tebal" style="overflow-y: auto; height:197px;" id="">
          <p class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="">
          <img  width="100%" src="<?php echo base_url() ?>assets/images/ads/350x250.png" alt="" class="img-responsive" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-16">
        <h3 class="main-title-dash"><span>WISATA & KULINER</span></h3>
        <div class="row">
          <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-1.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-2.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-3.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-1.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-2.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
            <div class="item topic"> <a href="#"> <img class="img-thumbnail" src="<?php echo base_url() ?>assets/images/lifestyle/lifestyle-slide-3.jpg" width="300" height="132" alt=""/>
              <h4>Etiam rhoncus. Maecenas tempus, tellus eget condimentum</h4>
              <div class="text-danger sub-info-bordered remove-borders">
                <div class="time"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                <div class="comments"><span class="ion-chatbubbles icon"></span>204</div>
                <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
              </div>
              </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
