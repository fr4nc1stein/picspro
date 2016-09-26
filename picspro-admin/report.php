<?php 
ob_start();
session_start();

//header scripts ( include css)
include('template/header.php');
//class
require_once '../lib/class.php';
//reports
require_once '../lib/reports.php';

//check session
$system->session_check();

?>

  <body class="no-skin">
    
    <!-- #top navigation bar -->
    <?php include('template/top-nav.php');?>

    <div class="main-container" id="main-container">
      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <!-- #side navigation bar -->
      <?php include('template/sidebar.php');?>

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
          </div>


            <div class="page-header">
              <h1>
                Reports
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  overview &amp; stats
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="alert alert-block alert-success">
                  <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                  </button>

                  <i class="ace-icon fa fa-check green"></i>

                  Welcome to
                  <strong class="green">
                    Infomation System
                    <small>(v1.3.3)</small>
                  </strong>,
                  </div>
                 <div class="row">
                  <div class="space-6"></div>

                  <div class="col-sm-12 infobox-container">
                    <div class="infobox infobox-green">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php $reports->count_members(); ?></span>
                        <div class="infobox-content">Registered</div>
                      </div>
                      <!-- <div class="stat stat-success">8%</div> -->
                    </div>

                    <div class="infobox infobox-blue">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php $gender='male'; $reports->count_gender($gender); ?></span>
                        <div class="infobox-content">Male</div>
                      </div>

                      <!-- <div class="badge badge-success">
                        +32%
                        <i class="ace-icon fa fa-arrow-up"></i>
                      </div> -->
                    </div>

                    <div class="infobox infobox-pink">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php $gender='female'; $reports->count_gender($gender); ?></span>
                        <div class="infobox-content">Female</div>
                      </div>
                      <!-- <div class="stat stat-important">4%</div> -->
                    </div>

                    <div class="infobox infobox-red">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php $gender='new'; $reports->member_type($gender); ?></span>
                        <div class="infobox-content">New Member</div>
                      </div>
                    </div>

                      <div class="infobox infobox-red">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-user"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php $gender='old'; $reports->member_type($gender); ?></span>
                        <div class="infobox-content">Old Member</div>
                      </div>

                     <!--  <div class="badge badge-success">
                        7.2%
                        <i class="ace-icon fa fa-arrow-up"></i>
                      </div> -->
                    </div>
                    </div>
                  </div>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Project-AG</span>
              Application &copy; 2015-2016
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->
<?php 
include('template/script.php');?>
  </body>
</html>
