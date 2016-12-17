<div id="sync1" class="owl-carousel">
<?php foreach ($list as $key => $value): ?>
  <div class="box item">
    <a href="<?php echo base_url($value->news_url) ?>">
      <div class="breaking-info">
        BREAKING NEWS
      </div>
      <div class="breaking-title">
        <div class="carousel-caption"><?php echo $value->news_title ?></div>
      </div>
      <img class="img-responsive" src="<?php echo base_url($value->news_thumb) ?>" width="1600" height="972" alt="<?php echo $value->news_title ?>"/>
      <div class="overlay"></div>
    </a>
  </div>
<?php endforeach; ?>
</div>
