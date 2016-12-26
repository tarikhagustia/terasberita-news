<link href="<?php echo base_url()?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/js/slim-image/slim/slim.min.css" rel="stylesheet">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
        Ads Management
        <small>
          Page rendering in {elapsed_time}
        </small>
      </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Manage Kanal Ads</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('status')): ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('status') ?>
            </div>
          <?php endif; ?>
          <br/>
          <?php echo form_open_multipart('backoffice/news_feed_ads_add', array('name' => 'ci_form')); ?>
          <?php
          echo form_hidden('width', 200+10);
          echo form_hidden('height', 100+10);
          ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Pilih Urutan
              </div>
              <div class="col-md-9">
                <select class="form-control" name="layout_name">
                  <option value="NFA">Urutan ke 1</option>
                  <option value="NFB">Urutan ke 2</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Link
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" name="link" placeholder="http://google.com" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Alt
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" name="alt" placeholder="Iklan dari teras berita" value="" required>
                <span class="help-text">Alt menjelaskan tentang deskripsi iklan,</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                File gambar
              </div>
              <div class="col-md-9">
                <input type="file" name="userfile" a size="20" />
                <small>Hannya bisa file JPG / GIF dengan ukuran Maxsimal <strong>200X100</strong> Px</small>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-offset-3">
                <button type="submit" class="btn btn-pimary">Update</button>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>
