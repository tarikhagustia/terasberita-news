<?php foreach ($list as $key => $value): ?>
  <li>
    <a href="<?php echo base_url($value->news_url) ?>">
    <div class="row">
      <div class="col-lg-3 col-md-4 hidden-sm">
        <img width="76" height="76" alt="" src="<?= base_url($value->news_thumb) ?>" class="img-thumbnail pull-left">
      </div>
      <div class="col-lg-13 col-md-12">
        <h4><?php echo $value->news_title ?></h4>
        <div class="text-danger sub-info">
          <div class="time"><span class="ion-android-data icon"></span><?php echo $value->news_timestamp ?></div>
          <div class="comments"><span class="ion-chatbubbles icon"></span><?php echo $value->news_views ?></div>

        </div>
      </div>
    </div>
    </a>
  </li>
<?php endforeach; ?>
