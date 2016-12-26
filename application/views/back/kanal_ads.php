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
          <?php echo form_open_multipart('backoffice/upload_iklan', array('name' => 'ci_form')); ?>
          <?php
          echo form_hidden('width', 336+10);
          echo form_hidden('height', 280+10);
          echo form_hidden('from', 'kanal_ads');
          ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Pada Halaman
              </div>
              <div class="col-md-9">
                <select class="select2_multiple form-control" multiple="multiple" name="select2[]">
                  <?php foreach ($dataPages as $key => $value): ?>
                    <option value="<?php echo $value->layout_id ?>"><?php echo $value->layout_location; ?></option>
                  <?php endforeach; ?>
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
                <small>Hannya bisa file JPG / GIF dengan ukuran Maxsimal <strong>680x80</strong> Px</small>
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
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#myAwesomeForm").on("submit",function() {
            // alert('SUbmited');
            var data = $('#editor').html();
              // console.log(data);
              $('input[name=isi]').val(data);
        });
       $('button[name=ceks]').click(function() {
              var data = $('#editor').html();
              // console.log(data);
              $('input[name=isi]').val(data);

          })
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        placeholder: "Pilih halaman",
        allowClear: true
      });
    });
  </script>
  <!-- /Select2 -->
