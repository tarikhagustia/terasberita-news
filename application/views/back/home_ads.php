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
          <h2>Manage Home Ads</h2>
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
          <?php echo form_open_multipart('backoffice/home_ads_add', array('name' => 'ci_form')); ?>
          <?php
          // echo form_hidden('width', 336+10);
          // echo form_hidden('height', 280+10);
          echo form_hidden('from', 'home_ads');
          ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                PIlih Layout
              </div>
              <div class="col-md-9">
                <select name="layout_name" class="form-control">
                  <option value="HAA">Iklan 336x280</option>
                  <option value="HAB">Iklan 350x550</option>
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
                <small>Hannya bisa file JPG / GIF dengan ukuran Maxsimal <strong>336x280</strong> Px</small>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-offset-3">
                <button type="submit" class="btn btn-success">Update</button>
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
