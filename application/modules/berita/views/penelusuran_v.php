<a href="<?php echo base_url($article->news_url) ?>" title="<?php echo $article->news_title ?>">
  <h3><?php echo $article->news_title ?></h3>
  <?php echo $this->format->text_only($article->news_desc, 0, 500) ?>
</a>
