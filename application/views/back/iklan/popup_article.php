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
          <h2>Manage <small>Pop Up</small></h2>
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
          <?php echo form_open_multipart('backoffice/ads_popup_article_input', array('name' => 'ci_form')); ?>
          <?php
          ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Pada Halaman
              </div>
              <div class="col-md-9">
                <select class="js-data-example-ajax form-control" name="news_list[]" required>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Keterangan
              </div>
              <div class="col-md-9">
                <input type="text" name="alt" value="" class="form-control" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Link <span class="text-danger">*</span>
              </div>
              <div class="col-md-9">
                <input type="text" name="link" value="" class="form-control" required/>
                <span class="small">Contoh format https://www.google.com </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                File gambar
              </div>
              <div class="col-md-9">
                <input type="file" name="userfile" accept="image/*" required/>
                <small>Hannya bisa file JPG / GIF / PNG dengan ukuran Maxsimal <strong>500x350</strong> Px dan ukuran file maksimal <strong>512 Kb</strong></small>
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
          <br/>
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>Artikel</th>
                <th>Iklan</th>
                <th>Tgl Tayang</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datas as $key => $value): ?>
                <tr>
                  <td><?php echo $value->news_title ?></td>
                  <td><?php echo $value->popup_alt ?></td>
                  <td><?php echo $value->created_at ?></td>
                  <td><a href="<?php echo base_url('backoffice/ads_popup_article_delete/'.$value->popup_id); ?>">Hapus</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <br/>
          <legend>Penempatan </legend>
          <img src="<?php echo base_url('assets/images/ads/pop-up.png') ?>" class="img-responsive" />
        </div>
      </div>
    </div>
  </div>
  <!-- Select2 -->
  <script src="<?php echo base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
  <script>
  $(document).ready(function() {
    $(".js-data-example-ajax").select2({
      placeholder: 'Pilih Artikel yang akan ditampilan',
      minimumInputLength: 1,
      minimumInputLength: 2,
      multiple: true,
      ajax: {
        url: '/api/getArticle',
        data: function (params) {
            var queryParameters = {
                article_name: params.term
            }
            return queryParameters;
        },
        processResults: function (data) {
          // console.log(data);
          return {
            results: $.map(data, function (item) {
              console.log(item);
                return {
                    text: item.news,
                    id: item.idh
                }
            })
        };
        }
      }
    });

  });
  </script>
  <!-- /Select2 -->
