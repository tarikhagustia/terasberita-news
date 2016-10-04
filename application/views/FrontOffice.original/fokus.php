<section id="pencarian">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-6 col-md-12 col-md-12">

                  <div class="box-hasil">
                      <?php foreach($dataFokus as $key => $value){ ?>
                      <div class="nav-content">
                        <?php
                        if($value->news_thumb == NULL || $value->news_thumb == ""):
                            echo '<div class="img-content"><a href="'.base_url($value->news_url).'"><img src="'.base_url().'assets/img/bg.jpg"></a></div>';
                        else:
                            echo '<div class="img-content"><a href=""><img src="'.base_url($value->news_thumb).'"></a></div>';
                        endif;
                        ?>

                        <div class="isi-content">
                            <a href="<?php echo base_url($value->news_url) ?>"><h4><?php echo $value->news_title ?></h4></a>
                            <p>
                                <?php echo $this->format->stripHTMLtags($value->descs, 0 , 100) ?> ...
                                <br><br>
                                <small><?php echo $value->news_timestamp ?> - </small><a href="#"><?php echo $value->category_alias ?></a>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!--BOX BERITA-->

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
                            <?php echo $this->format->date_indonesia($rows->news_timestamp) ?></p>
                    </div>
                <?php endforeach; ?>
                    </div><!--/FOK ISI-->
                </div>
            </div>
        </div>
    </div>
</section>
