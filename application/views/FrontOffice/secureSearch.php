<section id="detail-pencarian" class="container">
    <div class="col-md-12">
        <div class="nav-pencarian">
            <div class="notif">
                <?php if(count($dataSearch) <= 0): ?>
                    <blockquote>Maaf, tidak hasil untuk kata kunci pencarian "<?php echo $this->security->xss_clean($this->input->get('q')) ?>"</blockquote>
                <?php else: ?>
                    <blockquote>Hasil pencarian "<?php echo $this->security->xss_clean($this->input->get('q')) ?>" ditemukan pada <?php echo count($dataSearch) ?> dokumen</blockquote>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>

<section id="pencarian">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-6 col-md-12 col-md-12">
                  <div class="box-hasil">
                      <?php if(!empty($dataSearch)): ?>
                          <?php foreach($dataSearch as $rows): ?>
                            <div class="nav-content">
                                <?php if($rows->news_thumb == null || $rows->news_thumb == ""): ?>
                                    <div class="img-content"><a href=""><img src="<?php echo base_url() ?>assets/img/bg.jpg"></a></div>
                                <?php else: ?>
                                    <div class="img-content"><a href=""><img src="<?php base_url($rows->news_thumb) ?>"></a></div>
                                <?php endif; ?>
                                <div class="isi-content">
                                    <a href=""><h4><?php echo $rows->news_title ?></h4></a>
                                    <p class="text-justify">
                                        <?php echo $this->format->stripHTMLtags($rows->news_desc, 0 , 200) ?>
                                        <br><br>
                                        <small><?php echo $rows->news_timestamp ?> - </small><a href="#"><?php echo $rows->category_alias ?></a>
                                    </p>
                                </div>   
                            </div>  
                        <?php endforeach; else: ?>
                        <h3>Tidak ada hasil</h3>
                    <?php endif; ?>
                    <!--KOMENTAR-->
                </div>
            </div><!--BOX BERITA-->

            <div class="box-detail">
                <div class="title-populer"><h5>Populer</h5></div>
                <div class="fok-isi"><!--FOK ISI-->
                    <?php foreach($dataPopular as $rows): ?>
                        <div class="list">
                            <?php if($rows->news_thumb == null ): ?>
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                            <?php else: ?>
                                <img src="<?php echo base_url($rows->news_thumb) ?>">
                            <?php endif; ?>
                            <p class="des text-justify">
                                <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $this->format->stripHTMLtags($rows->news_title) ?></a><br>
                                <?php echo $this->format->stripHTMLtags($rows->news_desc, 0 , 100) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/FOK ISI-->
                </div>
                <!--COL-MD-6-->
            </div><!--BOX-->
        </div>
    </div>
</section>