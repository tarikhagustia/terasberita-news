<section id="deskripsi-berita">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-6">
                    <div class="box-deskripsi">
                        <!-- <p class="title"><small>Teras Berita / Fokus / Lorem Ipsum</small></p> -->
                        <div class="kanan">
                            <ul><li><small>Follow Teras Berita :</small></li>
                                <li class="follow-us"><a href=""><img src="<?php echo base_url() ?>assets/img/medsos/fb-2.png"></a></li>
                                <li class="follow-us"><a href=""><img src="<?php echo base_url() ?>assets/img/medsos/twit-2.jpg"></a></li>
                                <li class="follow-us"><a href=""><img src="<?php echo base_url() ?>assets/img/medsos/yutube-2.png"></a></li>
                            </ul>
                        </div>
                        <small><?php echo $dataArticle->news_timestamp ?></small>
                        <h4 class="title"><?php echo $dataArticle->category_alias ?></h4>
                        <h2 class="title"><?php echo $dataArticle->news_title ?></h2>
                        <small><?php echo $dataArticle->full_name ?> - <?php echo $dataArticle->category_alias ?></small>
                        <div class="des">
                        <?php if($dataArticle->news_thumb == NULL || $dataArticle->news_thumb == ''): ?>
                            <div class="img-header"><img src="<?php echo base_url() ?>assets/img/bg.jpg"></div>
                        <?php else: ?>
                            <div class="img-header"><img src="<?php echo $dataArticle->news_thumb ?>"></div>
                        <?php endif; ?>
                            <div class="isi">
                                <p>
                                    <h4 class="title"></h4>
                                    <?php echo $dataArticle->news_desc ?>
                                </p>
                            </div>
                        </div>
                         <!--KOMENTAR-->
 <div class="coment">
    <div class="box-coment">
        <div class="line-atas"><h5>271 Komentar</h5></div>
        <textarea placeholder="Silahkan Login untuk menulis komentar"></textarea>
        <div class="line-bawah">
           <!--  <div class="colom-kiri">
                <ul>
                    <li>500</li>
                    <li><input type="checkbox"><img src="img/medsos/fb-2.png"></input></li>
                    <li><input type="checkbox"><img src="img/medsos/twit-2.jpg"></input></li>
                </ul>
            </div> -->
            <div class="colom-kanan">
                <input type="submit" value="Kirim Komentar"></input>
            </div>
        </div>    
        <!-- <div class="line-navigasi">
            <a href="">Terbaru</a>
            <a href="">Terlama</a>
            <a href="">Populer</a>
        </div> -->
    </div>
    <div class="isi-coment">
        <div class="img-coment"><img src="<?php echo base_url() ?>assets/img/medsos/fb-2.png"></div>
        <div class="des-coment">
            <p class="pengirim">Adhe Kurniawan - <small>6 menit yang lalu</small></p>
            ______ and put anything you and put anything you want in them! and put anything you and put anything you want in them! and put anything you and put anything you want in them! and put anything you and put anything you want in them! and put anything you and put 
            <br><br>
            <a href="" style="float: left;">
                Balas
                Favorite
                Share
            </a>
            <a href="" style="float: right;">Laporkan</a>
        </div>
    </div>
</div>

                    </div>
                </div><!--BOX BERITA-->
                <div class="fokus"><!--populer-->
                    <div class="title-populer"><h5>Populer</h5></div>
                    <div class="fok-isi"><!--Populer isi-->
                        <div class="list">
                            <img src="<?php echo base_url() ?>assets/img/bg.jpg"/>
                            <p class="des">
                                <a class="title" href="populer-1.html">Use as many boxes as you</a><br>
                                and put anything you and put anything you want in them!
                            </p>
                        </div>
                    </div><!--/Populer isi-->
                    <div class="fok-isi"><!--Populer isi-->
                        <div class="list">
                            <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                            <p class="des">
                                <a class="title" href="populer-2.html">Use as many boxes as you</a><br>
                                and put anything you and put anything you want in them!</p>
                            </div>
                        </div><!--/Populer isi-->
                        <div class="fok-isi"><!--Populer isi-->
                            <div class="list">
                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                <p class="des">
                                    <a class="title" href="populer-5.html">Use as many boxes as you</a><br>
                                    and put anything you and put anything you want in them!</p>
                                </div>
                            </div><!--/Populer isi-->
                            <div class="fok-isi"><!--Populer isi-->
                                <div class="list">
                                    <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                    <p class="des">
                                        <a class="title" href="populer-5.html">Use as many boxes as you</a><br>
                                        and put anything you and put anything you want in them!</p>
                                    </div>
                                </div><!--/Populer isi-->
                                <div class="fok-isi"><!--Populer isi-->
                                    <div class="list">
                                        <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                        <p class="des">
                                            <a class="title" href="populer-5.html">Use as many boxes as you</a><br>
                                            and put anything you and put anything you want in them!</p>
                                        </div>
                                    </div><!--/Populer isi-->
                                </div>
                                <div class="fokus" style="margin-top: 20px;"><!--FOKUS-->
                                    <div class="title-populer"><h5>FOKUS</h5></div>
                                    <div id="scrolllable-fokus"><!--SCROLLLABLE-->
                                        <div class="fok-isi"><!--FOK ISI-->
                                            <div class="list">
                                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                <p class="des">
                                                    <a class="title" href="fokus-1.html">Use as many boxes as you</a><br>
                                                    and put anything you and put anything you want in them!</p>
                                                </div>
                                            </div><!--/FOK ISI-->
                                            <div class="fok-isi"><!--FOK ISI-->
                                                <div class="list">
                                                    <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                    <p class="des">
                                                        <a class="title" href="fokus-2.html">Use as many boxes as you</a><br>
                                                        and put anything you and put anything you want in them!</p>
                                                    </div>
                                                </div><!--/FOK ISI-->
                                                <div class="fok-isi"><!--FOK ISI-->
                                                    <div class="list">
                                                        <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                        <p class="des">
                                                            <a class="title" href="fokus-3.html">Use as many boxes as you</a><br>
                                                            and put anything you and put anything you want in them!</p>
                                                        </div>
                                                    </div><!--/FOK ISI-->
                                                    <div class="fok-isi"><!--FOK ISI-->
                                                        <div class="list">
                                                            <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                            <p class="des">
                                                                <a class="title" href="fokus-4.html">Use as many boxes as you</a><br>
                                                                and put anything you and put anything you want in them!</p>
                                                            </div>
                                                        </div><!--/FOK ISI-->
                                                        <div class="fok-isi"><!--FOK ISI-->
                                                            <div class="list">
                                                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                                <p class="des">
                                                                    <a class="title" href="fokus-5.html">Use as many boxes as you</a><br>
                                                                    and put anything you and put anything you want in them!</p>
                                                                </div>
                                                            </div><!--/FOK ISI-->
                                                            <div class="fok-isi"><!--FOK ISI-->
                                                                <div class="list">
                                                                    <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                                    <p class="des">
                                                                        <a class="title" href="fokus-5.html">Use as many boxes as you</a><br>
                                                                        and put anything you and put anything you want in them!</p>
                                                                    </div>
                                                                </div><!--/FOK ISI-->
                                                                <div class="fok-isi"><!--FOK ISI-->
                                                                    <div class="list">
                                                                        <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                                        <p class="des">
                                                                            <a class="title" href="fokus-5.html">Use as many boxes as you</a><br>
                                                                            and put anything you and put anything you want in them!</p>
                                                                        </div>
                                                                    </div><!--/FOK ISI-->
                                                                    <div class="fok-isi"><!--FOK ISI-->
                                                                        <div class="list">
                                                                            <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                                            <p class="des">
                                                                                <a class="title" href="fokus-5.html">Use as many boxes as you</a><br>
                                                                                and put anything you and put anything you want in them!</p>
                                                                            </div>
                                                                        </div><!--/FOK ISI-->
                                                                        <div class="fok-isi"><!--FOK ISI-->
                                                                            <div class="list">
                                                                                <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                                                                                <p class="des">
                                                                                    <a class="title" href="fokus-5.html">Use as many boxes as you</a><br>
                                                                                    and put anything you and put anything you want in them!</p>
                                                                                </div>
                                                                            </div><!--/FOK ISI-->
                                                                        </div>
                                                                    </div><!--COL-MD-6-->
                                                                </div><!--BOX-->
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
