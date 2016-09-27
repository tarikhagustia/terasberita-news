<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
        User Management
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
          <h2>Manage <small>users</small></h2>
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

        <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php echo form_open('backoffice/createUsers', array('class' => 'form-horizontal form-label-left')); ?>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" name="email" class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="full_name" class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" name="password" class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Konfirmasi Password <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" name="password_confirmation" class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Akses user <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              
              <select name="akses" class="form-control">
                <?php
                foreach($dataGroup as $rows):
                  echo "<option value='".$rows['group_id']."'>".$rows['group_alias']."</option>";
                endforeach;
                ?>                  
              </select>
            </div>
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
                  <th>Name</th>
                  <th>Username</th>
                  <th>Date Create</th>
                  <th>E - Mail</th>
                  <th>Tindakan</th>
                </tr>
              </thead>

              <tbody>
              
              <?php $i=1; foreach($data as $row) {  ?>
              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['date_create']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php if($row['username'] != 'theprogrammer'): ?><a href="<?php echo base_url('backoffice/delete/user/'.$row["id"]) ?>">Hapus</a><?php endif; ?></td>
                </tr>
              <?php $i++; }  ?>
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>