
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
        Manage Break Artikel
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
                    <h2>Form Design <small>Manage</small></h2>
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
                    
                     
                      <?php echo form_open_multipart('backoffice/creat_fokus', array('class' =>'form-horizontal form-label-left', 'id' => 'myAwesome'));?>
                      
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jdl-berita">Fokus Name</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="jdl-berita" name="fokus_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jdl-berita">Fokus Comen</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="jdl-berita" name="fokus_comen" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jdl-berita"></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="hidden" id="id" name="id" class="form-control col-md-7 col-xs-12" value="<?php echo $id;?>"/>
                        </div>
                      </div>
					            <div class="form-group">
                        <label for="name-pen" class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name-pen" class="form-control col-md-7 col-xs-12" type="hidden" name="isactive" value="1">
                        </div>
                      </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

