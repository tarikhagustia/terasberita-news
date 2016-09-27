
<div class="">

  <div class="page-title">
    <div class="title_left">
      <h3>
        User Manage Artikel
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
          <h2>Tabel <small>Manage</small></h2>
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
                    <th>Id</th>
                    <th>News Title</th>
                    <th>News Date Time</th>
                    <th>News Views</th>
                    <th>News Edite</th>
                   <!--  <th>News Delet</th>
                    <th>Manage Category</th> -->
                </tr>
              </thead>

              <tbody>
               <?php foreach($data as $row) {  ?>
                  <tr>
                      <td><?php echo $row['news_id']; ?></td>
                      <td><?php echo $row['news_title']; ?></td>
                      <td><?php echo $row['news_timestamp']; ?></td>
                      <td><?php echo $row['news_views']; ?></td>
                      <td><a href="<?php echo base_url('backoffice/edite/')?><?php echo $row['news_id']?>">Edit</a></td>
                      <!-- <td><a href="<?php echo base_url('backoffice/edite/')?><?php echo $row['news_id']?>">Delete</a></td>
                      <td><a href="<?php echo base_url('backoffice/edite/')?><?php echo $row['news_id']?>">Manage</a></td> -->
                  </tr>
               <?php }  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>