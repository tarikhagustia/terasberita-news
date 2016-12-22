<?php header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
  <loc><?php echo base_url();?></loc>
  <priority>1.0</priority>
  </url>
  <url>
    <loc><?php echo base_url('teras-nasional');?></loc>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?php echo base_url('teras-nusantara');?></loc>
    <priority>1.0</priority>
  </url>
  <?php foreach($data as $url) { ?>
  <url>
  <loc><?php echo base_url($url->news_url)?></loc>
  <lastmod><?php
    $date= date_create($url->news_timestamp);
    echo date_format($date,"c");
    ?></lastmod>
  <priority>0.5</priority>
  </url>
  <?php } ?>

</urlset>
