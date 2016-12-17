  <a href="#" target="_blank">
    <div class="center-block" align="center" style="margin-bottom: 5px;">
      <img class="img-responsive" src="<?= base_url('assets/images/ads/200x100-1.jpg') ?>" width="250" height="150"  alt="" />
    </div>
  </a>
<?php foreach ($list as $key => $value): ?>
  <?php if ($key == 6): ?>
    <a href="#" target="_blank">
      <div class="center-block" align="center"  style="margin-bottom: 5px;">
        <img class="img-responsive" src="<?= base_url('assets/images/ads/200x100-1.jpg') ?>" width="250" height="150"  alt="" />
      </div>
    </a>
  <?php else: ?>
  <li>
    <a href="<?php echo base_url($value->news_url) ?>">
      <div class="row">
        <div class="col-sm-6">
          <img class="img-thumbnail pull-left" src="<?php echo base_url($value->news_thumb) ?>" alt="<?php echo $value->news_title ?>" height="100" width="120">
        </div>
        <div class="col-sm-10">
          <h4><?php echo $value->news_title ?></h4>
          <div class="f-sub-info">
            <p>
              <?php echo $this->format->stripHTMLtags($value->news_desc, 0 , 100); ?> ...
            </p>
          </div>
        </div>
      </div>
    </a>
  </li>
<?php endif; ?>
<?php endforeach; ?>
