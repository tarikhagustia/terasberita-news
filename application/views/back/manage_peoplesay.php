<link href="<?php echo base_url()?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
        Content Management
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
          <h2>Manage <small>Peoplesay</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p class="alert alert-warning">
            Pilih 3 berita sekaligus
          </p>
          <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
              <?php echo validation_errors(); ?>
            </div>
          <?php endif; ?>
          <?php echo form_open_multipart('backoffice/manage_peoplesay_add', array('name' => 'ci_form')); ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                Pilih berita
              </div>
              <div class="col-md-9">
                <select class="js-data-example-ajax form-control" name="news_list[]" required>
                </select>
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
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>No</th>
                  <th>News</th>
                  <th>Created</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($data as $key => $value): ?>
                  <tr>
                    <td>
                      <?php echo $key+1; ?>
                    </td>
                    <td>
                      <?php echo $value->news_title ?>
                    </td>
                    <td>
                      <?php echo $value->created_at ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
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
