<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/daterange/css/daterangepicker.css">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
        Article Management
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
                    <h2>News Highlight <small>Manage</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                     
                      <?php echo form_open_multipart('backoffice/brek', array('class' =>'form-horizontal form-label-left', 'id' => 'myAwesome'));?>
                      
                      <div class="form-group">
                      <input type="hidden" id="jdl-berita" name="idnews" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id; ?>">
                        <label for="name-pen" class="control-label col-md-2 col-sm-2 col-xs-12">Date From </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" name="tanggal" class="form-control" id="tanggal"></input>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="name-pen" class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name-pen" class="form-control col-md-7 col-xs-12" type="hidden" name="active" value="1">
                        </div>
                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>
<!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/js/daterange/js/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/daterange/js/daterangepicker.js"></script>
<script type="text/javascript">
$(function() {
    $('input[name="tanggal"]').daterangepicker({
      timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'YYYY-MM-DD H:mm'
            }
    });
});
</script>
