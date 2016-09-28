
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
                    <a href="#" id="res">Redaksi</a>
                    <a href="#" id="res">Pedoman Media Siber</a>
                    <a href="#" id="res">Karir</a>
                    <a href="#" id="res">Kotak Pos</a>
                    <a href="#" id="res">Privacy Polisi</a>
                    <a href="#" id="res">Disclaimer</a>
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

</body>

</html>
