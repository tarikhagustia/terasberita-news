
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

          

          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>No</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Date Create</th>
                  <th>E - Mail</th>
                </tr>
              </thead>

              <tbody>
              <tr>
              <?php $i=1; foreach($data as $row) {  ?>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['date_create']; ?></td>
                  <td><?php echo $row['email']; ?></td>
              <?php $i++; }  ?>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>