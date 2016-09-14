<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
    <style type="text/css">
    body {
      background-image: url('<?php echo base_url() ?>assets/images/general/comming-soon.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
  </head>
  
  <body>
    <div class="cover" style="opacity: 0.5;">
      <div class="cover-image"></div>
      <div class="container">
      <div class="row">
        <div class="col-sm-12">
           <img src="<?php echo base_url() ?>assets/images/logo/terasberita.png"
            class="img-responsive">
        </div>
      </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 id="getting-started">Heading</h1>
            <p>Nantikan hal menakjubkan dari kami</p>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url() ?>assets/js/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript">
  $('#getting-started').countdown('2016/10/01', function(event) {
    $(this).html(event.strftime('%w minggu %d hari dan %H:%M:%S lagi'));
  });
</script>
  </body>

</html>