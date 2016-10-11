<section id="pencarian">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-6 col-md-12 col-md-12">
                  
                  <div class="box-hasil">
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
                    <!--KOMENTAR-->
                </div>
            </div><!--BOX BERITA-->

            <div class="box-detail">
                <div class="title-populer"><h5>Populer</h5></div>
                <div class="fok-isi"><!--FOK ISI-->
                    <?php foreach($dataPopular as $rows): ?>
                        <div class="row">
                            <div class="col-sm-3">
                            <?php if($rows->news_thumb == null ): ?>
                                <img class="img-responsive" src="<?php echo base_url() ?>assets/img/bg.jpg">
                            <?php else: ?>
                                <img class="img-responsive" src="<?php echo base_url($rows->news_thumb) ?>" style="margin-left: 5px;">
                            <?php endif; ?>
                            </div>
                            <div class="col-sm-8">
                                <p class="des text-justify">
                                    <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $this->format->stripHTMLtags($rows->news_title) ?></a><br>
                                    <?php echo $this->format->date_indonesia($rows->news_timestamp) ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div><!--/FOK ISI-->
            </div>
                <!--COL-MD-6-->
            </div><!--BOX-->
        </div>
    </div>
</section>
