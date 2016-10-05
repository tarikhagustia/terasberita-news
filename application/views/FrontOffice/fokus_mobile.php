<div class="visible-xs">
  <?php foreach($dataFokus as $key => $rows): ?>
  <div id='fokus-list'>
    <h1 class="padding">
      <small style="color: white;"><?php echo $key; ?></small>
    </h1>
    <?php foreach($rows as $key1 => $rows2): ?>
    <div class="list_artikel_fokus padding">
      <article>
        <a href="<?php echo base_url($rows2->news_url) ?>">
            <span class="box_txt">
              <h2 style="text-transform: none;"><?php echo $rows2->news_title ?></h2>
              <span class="tgl"><?php echo $this->format->date_indonesia($rows2->news_timestamp) ?></span>
            </span>
          </a>
        </article>
    </div>
  <?php  endforeach; ?>
  </div>
<?php endforeach; ?>
</div>
