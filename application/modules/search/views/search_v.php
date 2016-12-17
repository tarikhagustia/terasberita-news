<div class="row ">
        <!-- left sec start -->
  <div class="col-md-11 col-sm-11">
    <div class="row">
      <div class="google-cso">
        <div class="google-serach">
           <script>
           (function() {
             var cx = '014333525395834328135:eh8yjkg8jwq';
             var gcse = document.createElement('script');
             gcse.type = 'text/javascript';
             gcse.async = true;
             gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
             var s = document.getElementsByTagName('script')[0];
             s.parentNode.insertBefore(gcse, s);
           })();
         </script>
         <gcse:searchresults-only></gcse:searchresults-only>
      </div>
      </div>
    </div>
  </div>
  <!-- left sec end -->

  <!-- right sec start -->
  <div class="col-sm-5 hidden-xs right-sec">
    <div class="bordered">
      <div class="row ">
        <div class="col-sm-16 bt-space">
          <img class="img-responsive" src="<?php echo base_url() ?>assets/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a>
        </div>
        <!-- flicker imgs start -->
        <div class="col-sm-16 bt-space">
          <div class="main-title-outer pull-left">
            <div class="main-title full">Popular news</div>
            <ul class="list-unstyled">
              <?php echo modules::run('berita/get_popular'); ?>
            </ul>
          </div>
        </div>
        <!-- flicker imgs end -->
      </div>
    </div>
  </div>
</div>
