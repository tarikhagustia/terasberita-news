<section id="footer">
    <div class="container">
        <div class="col-md-12">
            <div class="span">
            <div class="footer">
            <div class="logo-bawah"><a href=""><img src="<?php echo base_url() ?>assets/img/logo-bawah.png"></a></div>
            <div class="footer-kanan">
                <ul>
                    <li class="medsos">
                        <a href=""><img src="<?php echo base_url() ?>assets/img/medsos/fb-3.png"></a>
                        <a href=""><img src="<?php echo base_url() ?>assets/img/medsos/twit-3.png"></a>
                        <a href=""><img src="<?php echo base_url() ?>assets/img/medsos/yutube-3.png"></a>
                    </li>
                    <li class="line"></li>
                    <li class="copyright" id="respon">Copyright &copy 2016 <a href="<?php echo base_url(); ?>">terasberita.co</a>. All Reserved.
                    <a href="<?php echo base_url('redaksi') ?>" id="res">Redaksi</a>
                    <a href="<?php echo base_url('pedoman-pemberitaan-media-siber') ?>" id="res">Pedoman Media Siber</a>
                    <a href="#" id="res">Karir</a>
                    <a href="#" id="res">Kotak Pos</a>
                    <a href="<?php echo base_url('privacy-policy') ?>" id="res">Privacy Policy</a>
                    <a href="<?php echo base_url('disclaimer') ?>" id="res">Disclaimer</a>
                    </li>
                </ul>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>
    <!-- For modal -->
    <script src="<?php echo base_url() ?>assets/js/login-register.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    jQuery(document).ready(function($) {

        jQuery('.cari').click(function(event) {
            $('#search-form').submit();
        });

    });

    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <!-- For facebook -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '199212920500045',
          xfbml      : true,
          version    : 'v2.7'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>
