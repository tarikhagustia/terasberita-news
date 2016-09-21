<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i>
            <span>Admin Panel</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo base_url('assets/images/img.jpg'); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('username'); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <br />
        <br />
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('backoffice/dashboard'); ?>" id="dashboard2" class='' >Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a><i class="fa fa-edit"></i> Hotel <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">Manage Hotel</a>
                            </li>
                            <li><a href="form_advanced.html">Manage Room Rate</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-desktop"></i> Corporate <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">Manage Corporate</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-table"></i> Reservasion <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="tables.html">Manage Room Reservasion</a>
                            </li>
                             <li>
                                <a href="tables.html">Manage Bidding</a>
                            </li>
                            <li>
                                <a href="tables.html">Manage Meeting & Event Request</a>
                            </li>
                            <li>
                                <a href="tables.html">Manage group request</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-bar-chart-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Chart JS</a>
                            </li>
                            <li><a href="chartjs2.html">Chart JS2</a>
                            </li>
                            <li><a href="morisjs.html">Moris JS</a>
                            </li>
                            <li><a href="echarts.html">ECharts </a>
                            </li>
                            <li><a href="other_charts.html">Other Charts </a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a><i class="fa fa-clone"></i> User Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('backoffice/manage_user'); ?>" id="dashboard2" class='' >Manage User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i> Artikel Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('backoffice/creat_new_artikel'); ?>" id="dashboard3" class='' >Creat New Artikel</a></li>
							<li><a href="<?php echo base_url('backoffice/manage_artikel'); ?>" id="dashboard4" class='' >Manage Artikel</a>
                        </ul>
					</li>
                </ul>
            </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>