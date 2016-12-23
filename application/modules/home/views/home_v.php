<div class="row" id="FixedDiv">
  <div class="col-sm-9">
    <?php echo modules::run('berita/get_breaking') ?>
  </div>
  <div class="col-sm-7">
    <div class="main-title full" style="margin-bottom: 2px;">AKTUALITAS</div>
    <?php echo modules::run('berita/get_aktualitas'); ?>
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
          <?php echo modules::run('berita/get_penelusuran') ?>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="">
          <img  width="100%" src="<?php echo base_url($penelusuran_img->news_thumb) ?>" alt="" class="img-responsive"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-16">
        <h3 class="main-title-dash"><span>WISATA & KULINER</span></h3>
        <div class="row">
          <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
            <?php echo modules::run('berita/get_wiskul') ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
