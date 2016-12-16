<?php foreach ($list as $key => $value): ?>
  <li>
    <a href="<?php echo base_url($value->news_url) ?>">
      <div class="row">
        <div class="col-lg-16 col-md-16">
          <h4><?php echo $value->news_title ?></h4>
          <div class="text-danger sub-info">
            <div class="time"><span class="ion-android-data icon"></span><?php echo $this->format->date_indonesia($value->news_timestamp) ?></div>
            <div class="comments"><span class="ion-eye icon"></span><?php echo $value->news_views ?></div>
          </div>
        </div>
      </div>
    </a>
  </li>
<?php endforeach; ?>
