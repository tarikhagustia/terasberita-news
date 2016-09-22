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
                            echo '<div class="img-content"><a href=""><img src="'.$value->news_thumb.'"></a></div>';
                        endif;
                        ?>
                        
                        <div class="isi-content">
                            <a href="<?php echo base_url($value->news_url) ?>"><h4><?php echo $value->news_title ?></h4></a>
                            <p>
                            <?php echo $this->format->stripHTMLtags($value->descs) ?> ...
                            <br><br>
                                <small><?php echo $value->news_timestamp ?> - </small><a href="#"><?php echo $value->category_alias ?></a>
                            </p>
                        </div>   
                    </div>
                    <?php } ?>
                </div>
            </div><!--BOX BERITA-->

            <div class="box-detail">
                <div class="detail">
                    <h5>Periode Waktu</h5>
                    <ul>
                        <li><h6>Periode Waktu</h6></li>
                        <li><a href="">Hari ini</a></li>
                        <li><a href="">1 Hari lalu</a></li>
                        <li><a href="">1 minggu lalu</a></li>
                        <li><a href="">1 bulan lalu</a></li>
                        <li><a href="">pilih tanggal</a></li>
                        <li><a href=""><input placeholder="DD/MM/YY"></input> s/d <input placeholder="DD/MM/YY"></input></li>
                    </ul>
                </div>
            </div><!--COL-MD-6-->
        </div><!--BOX-->
    </div>
</div>
</section>