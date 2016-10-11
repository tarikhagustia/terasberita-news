<style type="text/css">
  body {
    background-image: url('<?php echo base_url('assets/images/background/islamic.jpg') ?>');
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -op-background-size: cover;
  }
  .islamic {
    background-image: url('<?php echo base_url('assets/images/background/header-islamic.jpg') ?>') !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -op-background-size: cover;
    color: white !important;
  }
</style>
<div id="no-responsive" class="hidden-xs">
<section id="berita">
    <div class="container">
        <?php if($dataBreakingNews): ?>
        <div class="row">
            <div class="col-md-12"><!--modifikasi-->
                <div class="col-md-8"><!--/modifikasi-->
                  <div class="box-berita">
                     <h5 class="title">Berita Utama</h5>
                        <?php if($dataBreakingNews): ?><h3 class="title-breaking"><a href="<?php echo base_url($dataBreakingNews->news_url) ?>"><?php echo $dataBreakingNews->news_title ?></a></h3><?php endif; ?>
                    <div class="row">
                        <div class="col-md-8">
                          <?php if($dataBreakingNews): ?>
                          <?php if($dataBreakingNews->news_thumb == NULL || $dataBreakingNews->news_thumb == ""): ?>
                            <div id="breakingnews" style="background-image: url(<?php echo base_url() ?>assets/img/bg.jpg);width: auto;height: 300px;-webkit-background-size: cover;-moz-background-size: cover;">
                            <?php else: ?>
                              <div id="breakingnews" style="background-image: url(<?php echo base_url($dataBreakingNews->news_thumb) ?>);width: auto;height: 300px;-webkit-background-size: cover;-moz-background-size: cover;">
                            <?php endif; ?>
                        </div>
                    </div>
                      <div class="col-md-4">
                        <h5 class="subjudul"><?php echo $dataBreakingNews->category_alias ?></h5>
                        <p class="subisi text-justify">
                          <?php echo $this->format->stripHTMLtags($dataBreakingNews->news_desc2, 0, 100) ?>...
                        </p>
                        <p class="subtanggal">
                          <?php echo $this->format->date_indonesia($dataBreakingNews->news_timestamp); ?>
                        </p>
                        <?php if(!empty($dataBreakingNewsLeft)): ?>
                        <div class="titile_bt">Berita Terkait</div>
                        <?php foreach($dataBreakingNewsLeft as $rows): ?>
                        <article class="article_terkait">
                           <a href="<?php echo base_url($rows->news_url)?>">
                           <span><?php echo $rows->news_title ?></span>
                           </a>
                         </article>
                       <?php endforeach; ?>
                     <?php endif; ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                </div><!--BOX BERITA-->
                <!--modifikasi-->
                <div class="col-md-4">
                <!--/modifikasi-->
                    <div class="fokus"><!--FOKUS-->
                        <div class="title-populer islamic"><h5>terasPeristiwa</h5></div>
                            <div id="scrolllable-fokus"><!--SCROLLLABLE-->
                            <?php foreach($dataTerasPeristiwa as $key => $rows){ ?>
                            <div class="row">
                            	<div class="col-sm-3">
                            		<div class="profileImage" style="margin: 0 auto;"><?php echo $key+1; ?></div>
                            	</div>
                            	<div class="col-sm-9">
                            		<div class="peristiwa-ttile">
                            			<a class="title" href="<?php echo base_url('teras-peristiwa/'.$rows->fokus_url); ?>"><?php echo $rows->fokus_name; ?></a>
                            		<p style="font-size: 10px"><?php echo $rows->fokus_comment; ?></p>
                            		</div>

                            	</div>
                            </div>
                            <?php } ?>
                            </div>
                    </div>
                    <!--COL-MD-6-->
                </div>
            </div><!--BOX-->
        </div>
      <?php endif; ?>
    </div>
</section>

<?php if($dataIndeph): ?>

<section id="populer">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6">
                <div class="box-kiri"><!--kiri peristiwa-->
                    <div class="title-populer islamic"><h5>Populer</h5></div>
                      <div class="populer">
                        <div class="col-md-6">
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
                        </div>  <!--/col-md-6-->

                        <div class="col-md-6" style="padding: 0px;">
                      <div id="scrolllable-populer">
                          <div class="pop-kanan"><!--pop-kanan-->
                        	<?php foreach($dataPopular as $rows){
                        	?>
                            <div class="list" id="fokus">
                              <div class="col-md-4">
                                <?php if($rows->news_thumb == NULL || $rows->news_thumb == ""): ?>
                                  <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <?php else: ?>
                                  <img src="<?php echo base_url($rows->news_thumb)?>">
                                <?php endif; ?>
                              </div>
                              <div class="col-md-8">
                                <p class="des">
                                <a class="title" href="<?php echo $rows->news_url ?>"><?php echo $rows->news_title ?></a><br>
                                <?php echo $rows->category_alias . " | " . $this->format->date_indonesia($rows->news_timestamp) ?></p>
                              </div>
                            </div>

                        <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
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
                          <div class="col-md-8">
                            <div class="isi-kiri"><!--Isi-Kiri-Peristiwa-->
                                <div class="title-peristiwa"><h5><a href="<?php echo base_url($dataIndeph->news_url) ?>"><?php echo $dataIndeph->news_title ?> </a></h5></div>
                                <div class="des"><!--Deskripsi-->
                                    <p class="text-justify">
                                        <?php echo $this->format->stripHTMLtags($dataIndeph->news_desc, 0,150) ?>
                                    </p>
                                </div><!--/deskripsi-->
                            </div>
                            </div>
                          <div class="col-md-4">
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
</section>
<?php endif; ?>
<section id="news">
    <div class="container">
        <div class="col-md-6">
                <div class="box-kiri"><!--kiri peristiwa-->
                    <div class="title-populer islamic"><h5>NEWS FEED</h5></div>
                        <div id="scrolllable-news">
                        <?php foreach($dataNews as $key => $rows){ ?>
                         <div class="news-isi"><!--News-Isi-->
                            <div class="list">
                            <div class="col-md-4">
                                 <?php if($rows->news_thumb == NULL || $rows->news_thumb == ''): ?>
                                        <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <?php else: ?>
                                        <img src="<?php echo base_url($rows->news_thumb) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <p class="des-news">
                                <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a><br>
                                <small><?php echo $this->format->date_indonesia($rows->news_timestamp) ?></small><br>
                                <?php echo $this->format->stripHTMLtags($rows->news_desc, 0 ,200) ?>
                                </p>
                            </div></div>
                        </div><!--/News-Isi-->
                        <?php } ?>
                    </div>
                </div>
            </div>
          <div class="col-md-6">
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
                              <div class="col-md-6">
                                <div class="img-daftar">
                                    <p class="text-center" style="margin-left: -20px;">Jadilah bagian dari</p>
                                    <img src="<?php echo base_url() ?>assets/img/logo-bawah.png">
                                </div>
                                    <?php echo form_open('Auth/checkLoginAjax', array('id' => 'ajaxForm22')); ?>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-daftar">
                                      <ul>
                                          <li><input placeholder="Nama" name="full_name" type="text" required /></li>
                                          <li><input placeholder="Email" name="email" type="email" required /></li>
                                          <li><input placeholder="Password" name="password" type="password" required /></li>
                                          <li><input placeholder="Confirmasi Password" name="password_confirmation" type="password" required />
                                          <li><input type="submit" value="Daftar" id="submit" class="btn" /></li>
                                      </ul>
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
  </section>
</div>
</div>
<!-- Responsive -->
<div class="clearfix">
</div>
<div id="not-visible" class="visible-xs">
<?php if($dataBreakingNews): ?>
  <div id="m_breaking" class="container " style="background-image: url(<?php echo base_url($dataBreakingNews->news_thumb) ?>); ">
    <!-- <selction id="m_breaking"> -->
    <!-- </selction> -->
  </div>
  <div class="pembatas">
    <h5 class="m_judul"><a href="<?php echo $dataBreakingNews->news_url ?>"><?php echo $dataBreakingNews->news_title ?></a></h5>
    <p>
      <?php echo $dataBreakingNews->category_alias. " | ".$this->format->date_indonesia($dataBreakingNews->news_timestamp) ?>
    </p>
  </div>
  <div class="gap">
  </div>
<?php endif; ?>

  <!-- <div class="container"> -->
  <img class="img-ads-header" src="<?php echo base_url($data['header-809x188']) ?>" />
  <!-- </div> -->
  <div class="gap">
  </div>
<?php if($dataIndeph): ?>
  <div class="m_peristiwa">
    <div class="m_peristiwa_judul">
      Teras Kejadian Perkara
    </div>
    <div class="gap"></div>
    <img class="img-responsive" src="<?php echo base_url($dataIndeph->news_thumb) ?>" />
    <div class="gap"></div>
    <div class="m_peristiwa_judul">
      <h5><a href="<?php echo base_url($dataIndeph->news_url) ?>"><?php echo $dataIndeph->news_title ?></a></h5>
      <p class="text-justify">
        <?php echo $this->format->stripHTMLtags($dataIndeph->news_desc, 0 , 150); ?>
      </p>
    </div>
  </div>
  <div class="gap"></div>
<?php endif; ?>
  <?php if($dataNews): ?>
  <div class="m_news_feed">
    <div class="m_feed_judul">
      News Feeds
    </div>
    <div class="row">
      <div class="col-xs-12">
        <?php foreach($dataNews as $rows): ?>
          <div class="m_fedd_isi">
            <div class="row">
              <div class="col-xs-4">
                <!-- <img class="img-responsive" src="<?php echo base_url('assets/img/bg.jpg') ?>" /> -->
                <div class="img-feed" style="background-image: url(<?php echo base_url($rows->news_thumb) ?>); "></div>
              </div>
              <div class="col-xs-8" style="padding-left: 20px;">
                <span class="m_fedd_title"><a href="<?php echo $rows->news_url ?>"><?php echo $rows->news_title ?></a></span>
                <div class="gap">
                </div>
                <p>
                   <?php echo $this->format->date_indonesia($rows->news_timestamp) ?>
                </p>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
      </div>
    </div>

  </div>
<?php endif; ?>
  <div class="clearfix"></div>
</div>

<script type="text/javascript">
$("#ajaxForm22").submit(function( event ) {
  registerAjaxButtom();
  event.preventDefault();

});
</script>
