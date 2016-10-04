<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/daterange/css/daterangepicker.css">
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
          <h2>Manage <small>Indeph</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
        <?php echo form_open('backoffice/insert/indeph/', array('class' => 'form-horizontal form-label-left')); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih berita <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="news" class="form-control col-md-7 col-xs-12">
                          <?php foreach($dataNews as $rows): ?>
                            <option value="<?php echo $rows->news_id ?>"><?php echo $rows->news_title ?></option>
                          <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Periode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="pull-right" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar">
                            </i>
                            <span>
                            </span>
                              <b class="caret">
                            </b>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">

                          <input id="tanggal" name="tanggal" type="hidden" value="">
                          </input>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
          <br/>
          <?php if($this->session->flashdata('status')): ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('status') ?></div>
          <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>No</th>
                  <th>Artikel </th>
                  <th>Periode</th>
                  <th>Tindakan</th>
                </tr>
              </thead>

              <tbody>
              <?php foreach($dataIndeph as $key => $rows): ?>
              <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $rows->news_title ?></td>
                <td><?php echo $rows->date_from." s/d ".$rows->date_to  ?></td>
                <td>
                <a href="<?php echo base_url('backoffice/delete/indeph/'.$rows->indeph_id); ?>" onclick="return confirm('Apakah anda yakin ?');"> Hapus</a>
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
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/js/daterange/js/moment.js"></script>
    <script src="<?php echo base_url() ?>assets/js/daterange/js/daterangepicker.js"></script>
<script type="text/javascript">
    $(function() {

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY h:mm') + ' - ' + end.format('MMMM D, YYYY h:mm'));
            $('#tanggal').val(start.format('YYYY-MM-DD h:mm') + ' - ' + end.format('YYYY-MM-DD h:mm'));
        }
        cb(moment().subtract(29, 'days'), moment());

        $('#reportrange').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

    });
</script>
