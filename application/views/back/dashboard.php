
<div class="">
  <!-- PNotify -->
  <link href="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.buttons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendors/pnotify/dist/pnotify.nonblock.css'); ?>" rel="stylesheet">
  <div class="page-title">
    <div class="title_left">
      <h3>
        Welcome, <?php echo $this->session->userdata('full_name'); ?>
        
      </h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Welcome Page<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <h2>Selamat datang di Admin Panel terasberita.co</h2>
        </div>
      </div>
    </div>
  </div>
</div>
