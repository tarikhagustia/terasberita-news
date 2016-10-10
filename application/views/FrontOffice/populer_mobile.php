<section id="populer_mobile">
  <div class="text-center">
    <h3 class="title-mobile">Most Popular</h3>
    <?php foreach($dataLast as $rows):
      echo "<small>Last update : ".$this->format->date_indonesia($rows->news_timestamp)."</small>";
      endforeach;
    ?>
  </div>
  <div class="form-vertical">
    <form class="" action="#" method="get">
      <div class="form-group">
        <select name="kanal" class="form-control">
        <option value="" selected>Pilih kanal</option>
        <?php foreach($kanals as $rows): ?>

          <option value="<?php echo $rows->category_name ?>" <?php if($this->uri->segment(2) == $rows->category_name ): echo "selected"; endif; ?>><?php echo $rows->category_alias ?></option>
        <?php endforeach; ?>
        </select>
      </div>
    </form>
  </div>
  <hr/>

    <?php foreach($dataNews as $rows): ?>
    <div class="m_fedd_isi">
    <div class="row">
      <div class="col-xs-4">
        <div class="img-feed" style="background-image: url('<?php echo base_url($rows->news_thumb) ?>'); "></div>
      </div>
      <div class="col-xs-8" style="padding-left: 20px;">
        <span class="m_fedd_title"><a href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a></span>
        <div class="gap">
        </div>
        <p>
          <?php echo $this->format->date_indonesia($rows->news_timestamp); ?>
        </p>
        </div>
      </div>
      </div>
    <?php endforeach; ?>

  </section>
  <script>
  $(document).ready(function(){
    $('select[name=kanal]').change(function(event){
      urls = $(this).val();
      window.location.href = "<?php echo base_url('populer/') ?>" + urls;
    });
  });
  </script>
