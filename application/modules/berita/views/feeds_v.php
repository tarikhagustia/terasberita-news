<?php foreach ($list as $key => $value): ?>
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
<?php endforeach; ?>
