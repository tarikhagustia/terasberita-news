<?php foreach ($list as $key => $value): ?>
  <div class="item topic">
    <a href="<?= base_url($value->news_url) ?>">
      <img class="img-thumbnail" src="<?php echo base_url($value->news_thumb) ?>" width="300" height="132" alt=""/>
      <h4><?php echo $value->news_title ?></h4>
      <div class="text-danger sub-info-bordered remove-borders">
        <div class="time"><span class="ion-android-data icon"></span><?= $this->format->date_indonesia($value->news_timestamp); ?></div>
      </div>
    </a>
  </div>
<?php endforeach; ?>
