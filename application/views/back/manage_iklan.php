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
          <h2>Manage <small>Iklan</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <!-- <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""> -->
          <?php
          echo form_open('', array('id'=>'demo-form2', 'class' => 'form-horizontal form-label-left'));
          echo form_hidden('area', 'header-809x188');
          ?>
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Iklan Header 809 * 188 <span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <!-- <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" type="text"> -->
                <input type="file" name="body-500x280" class="" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
            <div class="ln_solid"></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
