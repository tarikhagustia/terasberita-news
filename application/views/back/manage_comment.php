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
          <h2>Manage <small>Comments</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                  <th>Name </th>
                  <th>Comment</th>
                  <th>Article</th>
                  <th>time</th>
                  <th>Tindakan</th>
                </tr>
              </thead>

              <tbody>
              <?php foreach($dataComment as $key => $rows): ?>
              <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $rows->full_name ?></td>
                <td><?php echo $rows->comment_text ?></td>
                <td><?php echo $rows->news_title ?></td>
                <td><?php echo $this->format->date_indonesia($rows->comment_timestamp) ?></td>
                <td>
                <a href="<?php echo base_url('backoffice/delete/komentar/'.$rows->comment_id) ?>" onclick="return confirm('Press a button');"> Hapus</a>
                <a href="<?php echo base_url('backoffice/approve_comment/'.$rows->comment_id)  ?>" onclick="return confirm('Apakah anda yakin ?');" >Approve</a></td>
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