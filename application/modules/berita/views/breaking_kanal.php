<?php if ($list): ?>
  <div class="box item">
  <a href="<?php echo base_url($list->news_url) ?>">
    <div class="carousel-caption"><?= $list->news_title ?></div>
    <img class="img-responsive" src="<?php echo base_url($list->news_thumb) ?>" width="1600" height="972" alt="<?= $list->news_title ?>"/>
    <div class="overlay"></div>
    <div class="overlay-info">
      <div class="cat">
        <p class="cat-data"><span class="ion-model-s"></span>Braking News</p>
      </div>
      <div class="info">
        <p><span class="ion-android-data"></span><?= $this->format->date_indonesia($list->news_timestamp) ?><span class="ion-eye"></span><?= $list->news_views ?></p>
      </div>
    </div>
  </a>
  </div>
<?php endif; ?>
