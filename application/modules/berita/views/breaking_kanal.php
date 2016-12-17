<?php if ($list): ?>
  <div class="box item">
  <a href="<?php echo base_url($list->news_url) ?>">
    <div class="breaking-info">
      BREAKING NEWS
    </div>
    <div class="carousel-caption"><?= $list->news_title ?></div>
    <img class="img-responsive" src="<?php echo base_url($list->news_thumb) ?>" width="1600" height="972" alt="<?= $list->news_title ?>"/>
    <div class="overlay"></div>
  </a>
  </div>
<?php endif; ?>
