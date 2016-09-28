<section id="berita">
    <div class="container">
        <?php if($dataBreakingNews): ?>
        <div class="row">
            <div class="box">
                <div class="col-md-6">
                  <div class="box-berita">
                    <h5 class="title">Berita Utama</h5>
                    <?php if($dataBreakingNews): ?><h3 class="title-breaking"><a href="<?php echo base_url($dataBreakingNews->news_url) ?>"><?php echo $dataBreakingNews->news_title ?></a></h3><?php endif; ?>
                    <div class="row">
                      <div class="col-md-8">
                      <?php if($dataBreakingNews): ?>
                      <?php if($dataBreakingNews->news_thumb == NULL || $dataBreakingNews->news_thumb == ""): ?>
                        <div id="breakingnews" style="background-image: url(<?php echo base_url() ?>assets/img/bg.jpg);width: auto;height: 300px;">
                        <?php else: ?>
                          <div id="breakingnews" style="background-image: url(<?php echo base_url($dataBreakingNews->news_thumb) ?>);width: auto;height: 300px;">
                        <?php endif; ?>
                          <div class="text-berita"><!--TextBeritaSlideshow -->
                              <h5 class="judul"><?php echo $dataBreakingNews->category_alias ?></h5>
                              <p class="banner text-justify"><?php echo $this->format->stripHTMLtags($dataBreakingNews->news_desc2, 0, 100) ?></p>
                              <p class="date"><?php echo $this->format->date_indonesia($dataBreakingNews->news_timestamp); ?></p>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-4">
                        <div class="titile_bt">Berita Terkait</div>
                        <?php foreach($dataBreakingNewsLeft as $rows): ?>
                        <article class="article_terkait">
                           <a href="<?php echo base_url($rows->news_url)?>">
                           <span><?php echo $rows->news_title ?></span>
                           </a>
                         </article>
                       <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                    </div>
                </div>
                </div><!--BOX BERITA-->
                    <div class="fokus"><!--FOKUS-->
                        <div class="title-populer"><h5>terasPeristiwa</h5></div>
                            <div id="scrolllable-fokus"><!--SCROLLLABLE-->
                            <?php foreach($dataTerasPeristiwa as $key => $rows){ ?>
                                <div class="fok-isi"><!--FOK ISI-->
                                    <div class="list">
                                        <div class="profileImage"><?php echo $key+1; ?></div>
                                        <p class="des">
                                        <a class="title" href="<?php echo base_url('teras-peristiwa/'.$rows->fokus_url); ?>"><?php echo $rows->fokus_name; ?></a>
                                        <br>
                                        <a href="<?php echo base_url('teras-peristiwa/'.$rows->fokus_url); ?>"><?php echo $rows->fokus_comment; ?></a>
                                        </p>
                                    </div>
                                </div><!--/FOK ISI-->

                            <?php } ?>

                               <!--/FOK ISI-->
                            </div>
                    </div>
                    <!--COL-MD-6-->
            </div><!--BOX-->
        </div>
      <?php endif; ?>
    </div>
</section>
<?php if($dataIndeph): ?>
<section id="populer">
    <div class="container">
        <div class="col-md-12">
            <div class="span">
                <div class="box-kiri"><!--kiri peristiwa-->
                    <div class="title-populer"><h5>Populer</h5></div>
                        <div class="populer">
                        <div class="pop-kiri"><!--pop-kiri -->
                          <?php if($dataPopularOne->news_thumb == NULL || $dataPopularOne->news_thumb == ""): ?>
                            <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                          <?php else: ?>
                            <img src="<?php echo base_url($dataPopularOne->news_thumb)?>">
                          <?php endif; ?>

                            <!-- <small><?php echo $dataPopularOne->news_title ?></small> -->
                            <a href="<?php echo $dataPopularOne->news_url ?>"><h5><?php echo $dataPopularOne->news_title ?></h5></a>
                            <p class="text-justify"><?php echo $this->format->stripHTMLtags($dataPopularOne->descriptions, 0 , 150) ?></p>
                        </div>  <!--/pop-kiri -->
                        <div id="scrolllable-populer">

                        <?php $rows = array(); foreach($dataPopular as $rows){
                        ?>
                        <div class="pop-kanan"><!--pop-kanan-->
                            <div class="list" id="fokus">
                                <?php if($rows->news_thumb == NULL || $rows->news_thumb == ""): ?>
                                  <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <?php else: ?>
                                  <img src="<?php echo base_url($rows->news_thumb)?>">
                                <?php endif; ?>
                                <p class="des text-justify">
                                <a class="title" href="<?php echo $rows->news_url ?>"><?php echo $rows->news_title ?></a><br>
                                <?php echo $rows->category_alias . " | " . $this->format->date_indonesia($rows->news_timestamp) ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

                <div class="box-kanan" id="peristiwa">
                    <div class="title-populer"><h5>Teras kejadian perkara - TKP</h5></div>
                        <div class="img-peristiwa"><!--Class Peristiwa-->
                        <?php

                        if($dataIndeph->news_thumb == NULL):
                            echo "<img class='img-responsive img-full' src='".base_url()."assets/img/slide-1.jpg' alt=''>";
                        else:
                            echo "<img class='img-responsive img-full' src='".base_url($dataIndeph->news_thumb)."' alt=''>";
                        endif;

                        ?>

                        </div>
                        <div class="isi-peristiwa">
                            <div class="isi-kiri"><!--Isi-Kiri-Peristiwa-->
                                <div class="title-peristiwa"><h5><a href="<?php echo base_url($dataIndeph->news_url) ?>"><?php echo $dataIndeph->news_title ?> </a></h5></div>
                                <div class="des"><!--Deskripsi-->
                                    <p class="text-justify">
                                        <?php echo $this->format->stripHTMLtags($dataIndeph->news_desc, 0,150) ?>
                                    </p>
                                </div><!--/deskripsi-->
                            </div>
                            <div class="isi-kanan"><!--isi-kanan-Peristiwa-->
                                <div class="title-peristiwa"><h5>BACA JUGA</h5></div>
                                <div class="des"><!--Deskripsi-->
                                    <ul id="des">
                                        <?php foreach($dataIndephLeft as $rows):?>
                                        <li><a href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title; ?></a></li>
                                      <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="news">
    <div class="container">
        <div class="col-md-12">
            <div class="span">
                <div class="box-kiri"><!--kiri peristiwa-->
                    <div class="title-populer"><h5>NEWS FEED</h5></div>
                        <div id="scrolllable-news">
                        <?php foreach($dataNews as $key => $rows){ ?>
                         <div class="news-isi"><!--News-Isi-->
                            <div class="list">
                                 <?php if($rows->news_thumb == NULL || $rows->news_thumb == ''): ?>
                                        <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <?php else: ?>
                                        <img src="<?php echo base_url($rows->news_thumb) ?>">
                                <?php endif; ?>

                                <p class="des-news">
                                <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a><br>
                                <small><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></small><br>
                                <?php echo $this->format->stripHTMLtags($rows->news_desc, 0 ,200) ?>
                                </p>
                            </div>
                        </div><!--/News-Isi-->
                        <?php } ?>
                    </div>
                </div>
            <div class="box-kanan" id="box-kanan"><!--Box-Kanan-->
                <div class="iklan">
                        <?php
                        $ads = $this->news->getData('fn_layout', 'layout_name, layout_type, layout_dir', array('layout_type' => 'ads'));
                        foreach ($ads as $key => $value) {
                            # code...
                            $data[$value->layout_name] = $value->layout_dir;
                        }
                        ?>
                        <img id="kfc" src="<?php echo base_url($data['body-532x280']) ?>">
                        <img id="kupon" src="<?php echo base_url($data['body-532x180']) ?>">
                        <div class="komentar"><!--Komentar-->
                            <div class="daftar">
                                <div class="img-daftar">
                                    <p class="text-center" style="margin-left: -20px;">Jadilah bagian dari</p>
                                    <img src="<?php echo base_url() ?>assets/img/logo-bawah.png"></div>
                                    <?php echo form_open('Auth/checkLoginAjax', array('id' => 'ajaxForm22')); ?>
                                   <ul>
                                       <li><input placeholder="Nama" name="full_name" type="text" required></input></li>
                                       <li><input placeholder="Email" name="email" type="email" required></input></li>
                                       <li><input placeholder="Password" name="password" type="password" required></input></li>
                                       <li><input placeholder="Confirmasi Password" name="password_confirmation" type="password" required></input></li>
                                       <li><input type="submit" value="Daftar" id="submit" ></input></li>
                                   </ul>
                                  <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="populer-responsive">
    <div class="container">
        <div class="col-md-12">
            <div class="span">
                <div class="col-md-6 col-md-12 col-md-12">
                    <div class="title-populer"><h5>NEWS FEED</h5></div>
                    <div class="news-responsive">
                         <div class="news-isi">
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des-news">
                                <a class="title" href="">Use as many boxes as you boxes as you</a><br>
                                <small>Yesterday | 10 Maret 2016 pukul 04.00</small></p>
                            </div>
                         <div class="news-isi">
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des-news">
                                <a class="title" href="">Use as many boxes as you boxes as you</a><br>
                                <small>Yesterday | 10 Maret 2016 pukul 04.00</small></p>
                            </div>
                        </div>
                         <div class="news-isi">
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des-news">
                                <a class="title" href="">Use as many boxes as you boxes as you</a><br>
                                <small>Yesterday | 10 Maret 2016 pukul 04.00</small></p>
                            </div>
                        </div>
                         <div class="news-isi">
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des-news">
                                <a class="title" href="">Use as many boxes as you boxes as you</a><br>
                                <small>Yesterday | 10 Maret 2016 pukul 04.00</small></p>
                            </div>
                        </div>
                         <div class="news-isi">
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des-news">
                                <a class="title" href="">Use as many boxes as you boxes as you</a><br>
                                <small>Yesterday | 10 Maret 2016 pukul 04.00</small></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div></div></div>
</section>
<script type="text/javascript">
$("#ajaxForm22").submit(function( event ) {
  registerAjaxButtom();
  event.preventDefault();

});
</script>
