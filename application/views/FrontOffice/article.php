<section id="deskripsi-berita">
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-sm-6">
                    <div class="box-deskripsi">
                        <!-- <p class="title"><small>Teras Berita / Fokus / Lorem Ipsum</small></p> -->
                        <div class="kanan">
                            <ul><li><small>Follow Teras Berita :</small></li>
                                <li class="follow-us"><a href="#"><img src="<?php echo base_url() ?>assets/img/medsos/fb-2.png"></a></li>
                                <li class="follow-us"><a href="#"><img src="<?php echo base_url() ?>assets/img/medsos/twit-2.jpg"></a></li>
                                <li class="follow-us"><a href="#"><img src="<?php echo base_url() ?>assets/img/medsos/yutube-2.png"></a></li>
                            </ul>
                        </div>
                        <small><?php echo $this->format->date_indonesia($dataArticle->news_timestamp) ?></small>
                        <h4 class="title"><?php echo $dataArticle->category_alias ?></h4>
                        <h2 class="title"><?php echo $dataArticle->news_title ?></h2>
                        <small><?php echo $dataArticle->full_name ?> - <?php echo $dataArticle->category_alias ?></small>
                        <div class="des">
                            <?php if($dataArticle->news_thumb == NULL || $dataArticle->news_thumb == ''): ?>
                                <div class="img-header">
                                <img class="img-responsive" src="<?php echo base_url() ?>assets/img/bg.jpg">
                                </div>
                            <?php else: ?>
                                <div class="img-header">
                                <img class="img-responsive" src="<?php echo base_url($dataArticle->news_thumb) ?>">
                                </div>
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
                            <?php if($this->session->flashdata()): ?>
                                <div class="alert alert-warning"><?php echo $this->session->flashdata('comment_status'); ?></div>
                            <?php endif; ?>
                            <div class="box-coment">
                                <div class="line-atas"><h5><?php echo count($dataCommentArticle) ?> Komentar</h5></div>
                                <?php echo form_open('FrontEnd/setComment');
                                echo form_hidden('crypt_news_id', $this->encrypt->encode($dataArticle->news_id));
                                ?>

                                <textarea name="comment_text" placeholder="<?php if (!$this->session->userdata('logged_in')): echo "Silahkan Login untuk menulis komentar'"; else: echo "Tulis komentar anda disini"; endif;?>" <?php if (!$this->session->userdata('logged_in')): echo "onclick='openLoginModal();'"; endif;?> ></textarea>
                                <div class="line-bawah">
                                    <?php if ($this->session->userdata('logged_in')):?>
                                        <div class="colom-kanan">
                                            <input type="submit" value="Kirim Komentar"></input>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                        <?php foreach($dataCommentArticle as $rows): ?>
                            <div class="isi-coment">
                                <div class="img-coment profilepicture">
                                <?php echo substr($rows->full_name, 0,1) ?>
                                <!-- <img src="<?php echo base_url() ?>assets/img/medsos/fb-2.png"> -->
                                </div>
                                <div class="des-coment">
                                    <p class="pengirim"><?php echo $rows->full_name ?> - <small><?php echo $rows->comment_timestamp ?></small></p>
                                    <p class="text-justify">
                                        <?php echo $this->security->xss_clean($rows->comment_text); ?>
                                    </p>
                                    <br><br>
                                    <a href="#" style="float: right;">Laporkan</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div><!--BOX BERITA-->
            <div class="fokus"><!--populer-->
                <div class="title-populer"><h5>Populer</h5></div>
                <?php foreach($dataPopuler as $rows): ?>
                    <div class="fok-isi">
                        <div class="list">
                            <img src="<?php echo base_url() ?>assets/img/bg.jpg">
                            <p class="des text-justify">
                                <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a><br>
                                <?php echo $this->format->stripHTMLtags($rows->descriptions, 0, 100) ?>
                            </p>
                        </div>
                    </div>
            <?php endforeach; ?>
            </div>
            <div class="fokus" style="margin-top: 20px;"><!--FOKUS-->
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
        </div>
    </div>
</section>
