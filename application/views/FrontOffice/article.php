<!-- Modal -->
<style>
.modal-dialog {
  overflow-y: hidden !important;
  overflow-x: hidden !important;
}
.relative{

  position:absolute;
  top:0px;
  right:100px;
}
.badge1 {
  position:relative;
}
.badge1[data-badge]:after {
  content:attr(data-badge);
  position:absolute;
  top:-10px;
  right:-10px;
  font-size:.7em;
  background:green;
  color:white;
  width:18px;height:18px;
  text-align:center;
  line-height:18px;
  border-radius:50%;
  box-shadow:0 0 1px #333;
}
</style>
<?php if ($popups): ?>
  <div id="myModal" class="modal fade" role="dialog" data-backdrop="static" >
    <div class="modal-dialog">
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo $popups->popup_link ?>" target="_blank" ><img src="<?php echo base_url($popups->popup_img) ?>" class="popup img-responsive center-block" align="center" alt="<?php echo $popups->popup_alt ?>"/></a>
          <!-- <h1 class="relative">&times;</h1> -->
          <span class="relative close" data-dismiss="modal" hidden>&times; close</span>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<div id="no-resposive" class="hidden-xs">
  <section id="deskripsi-berita">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-sm-8">
            <div class="box-deskripsi">
              <?php if($dataArticle->category_id != '7'): ?>
                <small><?php echo $this->format->date_indonesia($dataArticle->news_timestamp) ?></small>
                <h4 class="title"><?php echo $dataArticle->category_alias ?></h4>
              <?php endif; ?>
              <h2 class="title-article"><?php echo $dataArticle->news_title ?></h2>
              <div
              class="fb-like"
              data-share="true"
              data-width="450"
              data-show-faces="true">
            </div>
            <br/>
            <?php if($dataArticle->category_id != '7'): ?>
              <small><?php if($dataArticle->news_creator != null): echo $dataArticle->news_creator ;else: echo "Tim teras"; endif; ?> - <?php echo $dataArticle->category_alias ?></small>
              <?php endif; ?>
              <div class="des">
                <?php if($dataArticle->category_id != '7'): ?>
                  <?php if($dataArticle->news_thumb == NULL || $dataArticle->news_thumb == ''): ?>
                    <div class="img-header">
                      <img class="img-responsive lazy" data-src="<?php echo base_url() ?>assets/img/bg.jpg">
                    </div>
                  <?php else: ?>
                    <div class="img-header">

                      <figure>
                        <img class="img-responsive lazy" data-src="<?php echo base_url($dataArticle->news_thumb) ?>" alt="" />
                        <!-- <img class="img-responsive lazy" src="<?php echo base_url($dataArticle->news_thumb) ?>"/> -->
                        <figcaption class="text-italic"><em><?php echo $dataArticle->caption; ?></em></figcaption>
                      </figure>
                    </div>
                  <?php endif; ?>
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
          <div class="col-md-4">
            <div class="fokus"><!--populer-->
              <div class="title-populer"><h5>Populer</h5></div>
              <?php foreach($dataPopuler as $rows): ?>
                <div class="fok-isi">
                  <div class="list">
                    <div class="col-md-4 col-xs-4">
                      <img class="lazy" data-src="<?php echo base_url($rows->news_thumb) ?>">
                    </div>
                    <div class="col-md-8 col-xs-8">
                      <p class="desc text-justify">
                        <a class="title" href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a><br>
                        <?php echo $this->format->date_indonesia($rows->news_timestamp) ?>
                      </p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="fokus" style="margin-top: 200px;" hidden="true"><!--FOKUS-->
              <div class="title-populer"><h5>terasPeristiwa</h5></div>
              <div id="scrolllable-fokus"><!--SCROLLLABLE-->
                <?php foreach($dataTerasPeristiwa as $key => $rows){ ?>
                  <div class="fok-isi"><!--FOK ISI-->
                    <div class="list">
                      <div class="col-md-4 col-xs-4">
                        <div class="profileImage" style="margin: auto;"><?php echo $key+1; ?>
                        </div>
                      </div>
                      <div class="col-md-8 col-xs-8">
                        <p class="des text-justify">
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
        </div>
        <div class="clearfix">
        </div>
        <div id="not-visible" class="visible-xs">
          <div class="box-deskripsi">
            <small><?php echo $this->format->date_indonesia($dataArticle->news_timestamp); ?></small>
            <h4 class="title"><?php echo $dataArticle->category_alias ?></h4>
            <h2 class="title-article"><?php echo $dataArticle->news_title ?></h2>
            <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
          </div>
          <br/>
          <small><?php if($dataArticle->news_creator != null): echo $dataArticle->news_creator ;else: echo "Tim teras"; endif; ?> - <?php echo $dataArticle->category_alias ?></small>
            <div class="des">
              <?php if($dataArticle->news_thumb == NULL || $dataArticle->news_thumb == ''): ?>
                <div class="img-header">
                  <img class="img-responsive lazy" data-src="<?php echo base_url() ?>assets/img/bg.jpg">
                </div>
              <?php else: ?>
                <div class="img-header">
                  <figure>
                    <img class="img-responsive lazy" data-src="<?php echo base_url($dataArticle->news_thumb) ?>"/>
                    <figcaption class="text-italic"><em><?php echo $dataArticle->caption; ?></em></figcaption>
                  </figure>
                </div>
              <?php endif; ?>
              <div class="isi">
                <p>
                  <h4 class="title"></h4>
                  <?php echo $dataArticle->news_desc ?>
                </p>
              </div>
            </div>
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
          </section>
        </div>
      </div>
      <?php if($popups): ?>
        <script>
        $(document).ready(function(){
          // Kalo misal user udah lat iklan, iklan jangan ditampilin lagi broth
          // Tapi gajadi permintaan syahdan
          // if(localStorage.getItem('<?php echo $dataArticle->news_id ?>') != 'shown'){
            $('#myModal').modal({
              show: 'true',
              backdrop: 'static',
              keyboard: true
            })
            setTimeout(function(){
              $('.relative').show();
            }, 3000);
            localStorage.setItem('<?php echo $dataArticle->news_id ?>','shown')
          // }else{
          //
          // }

        });
        </script>
      <?php endif; ?>
