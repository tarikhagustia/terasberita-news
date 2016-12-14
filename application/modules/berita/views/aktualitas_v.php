<div class="bordered" id="aktualitas">
  <img src="<?php echo base_url($list->news_thumb) ?>" alt="<?php echo $list->news_title ?>"  class="img-responsive"/>
  <h4><?php echo $list->news_title ?></h4>
  <p>
    <?php echo $this->format->text_only($list->news_desc, 0 ,100) ?>
  </p>
</div>
