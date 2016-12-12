<div id="sync1" class="owl-carousel">
<?php foreach ($list as $key => $value): ?>
  <div class="box item">
    <a href="<?php echo base_url($value->news_url) ?>">
      <div class="carousel-caption"><?php echo $value->news_title ?></div>
      <img class="img-responsive" src="<?php echo base_url($value->news_thumb) ?>" width="1600" height="972" alt="<?php echo $value->news_title ?>"/>
      <div class="overlay"></div>
      <div class="overlay-info">
        <div class="cat">
          <p class="cat-data"><span class="ion-model-s"></span>BRAKING NEWS</p>
        </div>
        <div class="info">
          <p><span class="ion-android-data"></span><?php echo $this->format->date_indonesia($value->news_timestamp) ?></p>
        </div>
      </div>
    </a>
  </div>
<?php endforeach; ?>
</div>
