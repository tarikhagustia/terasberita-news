<?php
class Meta extends BeritaController
{
  public function __construct()
  {
      parent::__construct();
  }
  public function print($is_article = false, $news_url = null)
  {
    if($is_article == true):
      $this->db->select('*')->from('fn_news')
      ->where('news_url', $news_url);
      $dataArticle = $this->db->get()->row();
      $data = [
        '<meta property="fb:app_id"        content="199212920500045" />',
        '<meta property="og:image"         content="' . base_url($dataArticle->news_thumb) . '" />',
        '<meta property="og:site_name"     content="terasberita.co"/>',
        '<meta property="og:description"   content=" ' . $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100) . '" />',
        '<meta property="og:url"           content="' . current_url() .  '" />',
        '<meta property="og:type"          content="article" />',
        '<meta property="og:title"         content="' . $dataArticle->news_title . '" />',
        '<meta name="language" content="id" />',
        '<meta name="title" content="' . $dataArticle->news_title . '" />',
        '<meta name="description" content=" ' . $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100) . '" />',
        '<meta name="keywords" content="<?php ' . $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100) . '" />',
        '<link rel="image_src" href="' . base_url($dataArticle->news_thumb) . '"/>',
        '<meta name="news_keywords" content="' . $this->format->stripHTMLtags($dataArticle->news_desc, 0 , 100) . '" />',
        '<link rel="canonical" href="' . current_url() . '">'
      ];
    else:
      $data = [
        '<meta name="apple-mobile-web-app-capable" content="yes" />',
        '<meta name="language" content="id" />',
        '<meta name="title" content="terasberita.co - Indepth, Jujur , Akurat"/>',
        '<meta name="description" content="Indepth Jujur Akurat" />',
        '<meta name="keywords" content="Sukabumi, sukabumi, terasberita, teras berita, sukabumi kabupaten, sukabumi kota, sukabumi selatan, berita sukabumi, berita, berita sukabumi terbaru, berita sukabumi hari ini, berita populer, berita sukabumi populer, bisnis, politik , ekonomi, hukum, kriminal, kasus, populer, peristiwa, kontroversi, investigasi, indonesia, daerah, nasional, internasional, dunia, jabar, jawa barat" />',
        '<meta name="news_keywords" content="Sukabumi, sukabumi, terasberita, teras berita, sukabumi kabupaten, sukabumi kota, sukabumi selatan, berita sukabumi, berita, berita sukabumi terbaru, berita sukabumi hari ini, berita populer, berita sukabumi populer, bisnis, politik , ekonomi, hukum, kriminal, kasus, populer, peristiwa, kontroversi, investigasi, indonesia, daerah, nasional, internasional, dunia, jabar, jawa barat, bocah sd mati, bocah sd mading, mading" />',
        '<meta name="classification" content="Sukabumi, sukabumi, terasberita, teras berita, sukabumi kabupaten, sukabumi kota, sukabumi selatan, berita sukabumi, berita, berita sukabumi terbaru, berita sukabumi hari ini, berita populer, berita sukabumi populer, bisnis, politik , ekonomi, hukum, kriminal, kasus, populer, peristiwa, kontroversi, investigasi, indonesia, daerah, nasional, internasional, dunia, jabar, jawa barat" />',
        '<meta http-equiv="refresh" content="800" />',
        '<meta name="distribution" content="Global" />',
        '<meta name="rating" content="General" />',
        '<meta name="robots" content="index, follow" />',
        '<meta content="all" name="robots"/>',
        '<meta content="index, follow" name="robots"/>',
        '<meta content="index, follow" name="yahoobot"/>',
        '<meta name="revisit-after" content="2 days" />',
        '<meta name="creator" content="terasberita.co - Indepth, Jujur , Akurat" />',
        '<meta name="publisher" content="Solusi Digital Untuk Bisnis Anda Allblue Technology" />',
        '<meta name="copyright" content="Copyright &copy; 2016 terasberita.co"/>',
        '<meta name="author" content="terasberita.co"/>',
        '<meta name="email" content="cs@terasberita.co"/>'
      ];
    endif;
    foreach ($data as $key => $value) {
      echo $value . "\n";
    }

  }
}

 ?>
