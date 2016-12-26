<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=199212920500045";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="row" id="FixedDiv">
  <div class="col-sm-10">
    <div>
      <!-- start of breaking -->
      <?php echo modules::run('berita/get_breaking', $kanal) ?>
      <!-- end of breaking -->
    </div>
  </div>
  <div class="col-sm-6">
    <?php echo modules::run('ads/get_kaa', $kanal); ?>
  </div>
  <hr/>
</div>
<div class="row">
  <div class="col-sm-5" >
      <div class="batas"></div>
      <div class="main-title full">Popular news</div>
      <div class="bordered">
        <ul class="list-unstyled">
          <?php echo modules::run('berita/get_popular', $kanal) ?>
        </ul>
      </div>
      <div class="batas"></div>
      <div class="col-sm-16">
        <div class="main-title-outer pull-left">
          <div class="main-title full">teras peristiwa</div>
        </div>
        <div class="topic">
          <?php echo modules::run('berita/get_peristiwa'); ?>
        </div>
      </div>
      <!-- top rating start -->

  </div>
  <div class="col-sm-5">
    <div class="">
      <h3 class="main-title-dash"><span>NEWS FEED</span></h3>
      <div class="bordered" style="overflow-y: auto; height:800px;" id="">
        <ul class="list-unstyled">
          <?php echo modules::run('berita/get_feeds', $kanal); ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="main-title full" style="margin-bottom: 2px;">teras kejadian perkara</div>
    <div class="bordered" id="teraskejadianperkara">
      <?php echo modules::run('berita/get_tkp') ?>
    </div>
    <div class="main-title full" style="margin-bottom: 2px;">terasberita Fans page</div>
    <div class="bordered">
      <div class="fb-page" data-href="https://www.facebook.com/terasmediatama" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/terasmediatama" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/terasmediatama">terasberita.co</a></blockquote></div>
    </div>
  </div>
</div>
