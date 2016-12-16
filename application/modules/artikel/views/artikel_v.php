<?php
// $this->config->set_item('meta_article', true);
set_config('meta_article', true);

 ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=199212920500045";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="row ">
      <!-- left sec Start -->
      <div class="col-md-11 col-sm-11">
        <div class="row">
          <!-- post details start -->
          <div class="col-sm-16">
            <div class="row">
              <div class="sec-topic col-sm-16">
                <div class="row">
                  <div class="col-sm-16">
                    <figure>
                      <img width="1000" height="606" alt="<?= $article->news_title ?>" src="<?= $article->news_thumb ?>" class="img-thumbnail">
                      <figcaption class="text-italic"><em><?php echo $article->caption; ?></em></figcaption>
                    </figure>
                  </div>
                  <div class="col-sm-16 sec-info">
                    <h3><?php echo $article->news_title; ?></h3>
                    <div class="text-danger sub-info-bordered">
                      <div class="author"><span class="ion-person icon"></span>Oleh : <?= $article->news_creator ?></div>
                      <div class="time"><span class="ion-android-data icon"></span><?= $this->format->date_indonesia($article->news_timestamp); ?></div>
                      <div class="comments"><span class="ion-eye icon"></span><?= $article->news_views ?></div>
                    </div>
                    <div id="shared">
                      <div class="fb-like" data-href="https://facebook.com/terasmediatama" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                    </div>
                  <article>
                    <!-- start article -->
                    <?php echo $article->news_desc ?>
                    <!-- end of article -->
                  </article>
                  </div>
                </div>
              </div>
              <div class="col-sm-16 comments-area">
                <div class="main-title-outer pull-left">
                  <div class="main-title">Komentar</div>
                </div>
                <div class="opinion pull-left">
                  <!-- FACEBOOK COMMENT -->
                  <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="800"></div>
                  <!-- END FACEBOOK COMMENT -->
                </div>
              </div>
            </div>
          </div>
          <!-- post details end -->
        </div>
      </div>
      <!-- left sec End -->
      <!-- right sec Start -->
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
                <?php echo modules::run('berita/get_popular'); ?>
              </div>
            </div>
            <!-- flicker imgs end -->
          </div>
        </div>
      </div>
      <!-- Right Sec End -->
    </div>
<?php
add_js('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58529b13a43d24da');
 ?>
