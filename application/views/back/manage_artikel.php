
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
          <h2>List <small>Article</small></h2>
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

          <?php if($this->session->flashdata()): ?>
            <div class="alert alert-success">
            <?php echo $this->session->flashdata('status'); ?>
            </div>
          <?php endif; ?>

          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                    <th>News Title</th>
                    <th>News Date Time</th>
                    <th>News Views</th>
                    <th>News Edite</th>
                    <th>Break News</th>
                    <th>Fokus News</th>
                </tr>
              </thead>

              <tbody>
               <?php foreach($data as $row) {  ?>
                  <tr>
                      <td><a href="<?php echo base_url($row['news_url']) ?>" target="_blank"> <?php echo substr($row['news_title'],0,30); ?></a></td>
                      <td><?php echo $row['news_timestamp']; ?></td>
                      <td><?php echo $row['news_views']; ?></td>
                      <td><a href="<?php echo base_url('backoffice/edite/')?><?php echo $row['news_id']?>">Edit</a></td>
                      <td>
                        <?php if($row['date_from'] == null):  ?> 
                        <a href="<?php echo base_url('backoffice/break_news/')?><?php echo $row['news_id']?>"><span class="label label-success" >Jadikan Highligh</span></a>
                      <?php else: ?>
                        <a href="<?php echo base_url('backoffice/delet_break/')?><?php echo $row['news_id']?>"><?php echo $row['date_from']. " s/d ".$row['date_to'] ?></a>
                      <?php endif; ?>
                      </td>
                      <td>
                      <?php if($row['fokus_id'] == null):  ?> 
                        <a href="<?php echo base_url('backoffice/fokus_news/')?><?php echo $row['news_id']?>"><span class="label label-success" >Jadikan Fokus</span></a>
                      <?php else: ?>
                        <a href="<?php echo base_url('backoffice/delet_fokus/')?><?php echo $row['fokus_id']?>"><?php echo substr($row['fokus_name'],0,10)?></a>
                      <?php endif; ?>
                      </td>
                  </tr>
               <?php }  ?>
              </tbody>
            </table>
			<?php echo $paging;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
