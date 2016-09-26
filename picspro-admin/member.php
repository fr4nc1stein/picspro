<?php
ob_start();
session_start();
//iniatilize all the data

include('template/header.php');

//database class
include('../lib/class.php');

//validator
require "../lib/gump.class.php";

//check session
$system->session_check();

$validator = new GUMP();

if (isset($_POST['register']) && $_POST['csrftoken']=='jaSf3829nFjaSdf832rjNsdf')
{

$email_address=filter_var($_POST['email_address'], FILTER_SANITIZE_EMAIL);
$member_type=filter_var($_POST['member_type'], FILTER_SANITIZE_STRING);
$gender=filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
$lastname=filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
$firstname=filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
$middlename=filter_var($_POST['middlename'], FILTER_SANITIZE_STRING);
$birthday=filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
$placeofbirth=filter_var($_POST['placeofbirth'], FILTER_SANITIZE_STRING);
$company_name=filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
$company_address=filter_var($_POST['company_address'], FILTER_SANITIZE_STRING);
$position=filter_var($_POST['position'], FILTER_SANITIZE_STRING);
$residence_address=filter_var($_POST['residence_address'], FILTER_SANITIZE_STRING);
$mobile_number=filter_var($_POST['mobile_number'], FILTER_SANITIZE_STRING);
$specialization=filter_var($_POST['specialization'], FILTER_SANITIZE_STRING);
$membership_other=filter_var($_POST['membership_other'], FILTER_SANITIZE_STRING);

	try
			{
				$query = $conn->prepare("SELECT email_address FROM member WHERE email_address=:email_address");
				$query->execute(array(':email_address'=>$_POST['email_address']));
				$row = $query->fetch();
				if($row['email_address']==$_POST['email_address']) {
								$error[] = "Sorry Email Address already taken!";
							}
							elseif($system->membership($email_address,$member_type,$gender,$lastname,$firstname,$middlename,$birthday,$placeofbirth,$company_name,$company_address,$position,$residence_address,$mobile_number,$specialization,$membership_other)){

									$system->redirect('member.php?joined');
								}else{
									$system->redirect('member.php?error');
								}
							}
							catch(PDOException $e)
							{
								echo $e->getMessage();
							}
}
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
								Registration
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									New Members
								</small>
							</h1>
						</div><!-- /.page-header -->
						<?php
					if(isset($error))
					{
					foreach($error as $error)
					{
					?>
							 <div class="alert alert-danger">
									<i class="fa fa-info"></i> &nbsp; <?php echo $error; ?>
							 </div>
							 <?php
					}
					}
					else if(isset($_GET['joined']))
					{
					?>
					 <div class="alert alert-info">
								<i class="fa fa-info"></i> &nbsp; Successfully registered <a href='member.php'>add data</a> here
					 </div>
					 <?php
					}
					else if(isset($_GET['invalid']))
					{
					?>
					 <div class="alert alert-danger">
								<i class="fa fa-info"></i> &nbsp; Invalid Characters <a href='member.php'>add data</a> here
					 </div>
					 <?php
					}
					?>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post">

									<input type="hidden" name="csrftoken" id="form-field-1" value="jaSf3829nFjaSdf832rjNsdf" class="col-xs-10 col-sm-5" />

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email Address </label>

										<div class="col-sm-6">
											<input type="email" name="email_address" id="form-field-1" placeholder="Email Address"  title="Enter Valid Email Address"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Member Type </label>

										<div class="col-sm-9">
											<div class="radio">
												<label>
													<input name="member_type" type="radio" class="ace" value="new" required/>
													<span class="lbl"> New</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input name="member_type" type="radio" class="ace" value="old" required/>
													<span class="lbl"> Old</span>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gender </label>

										<div class="col-sm-3">
											<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="gender" required>
														<option>Male</option>
														<option>Female</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-6">
											<input type="text" name="lastname" id="form-field-1" placeholder="Last Name" class="col-xs-10 col-sm-5" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>

										<div class="col-sm-6">
											<input type="text" name="firstname" id="form-field-1" placeholder="First Name" class="col-xs-10 col-sm-5" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Middle Name </label>

										<div class="col-sm-6">
											<input type="text" name="middlename" id="form-field-1" placeholder="Middle Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth </label>
										<div class="col-sm-2">
											<input class="form-control date-picker" id="id-date-picker-1" type="text" name="birthday" data-date-format="yyyy-mm-dd" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Place of Birth </label>
										<div class="col-sm-9">
											<input type="text" name="placeofbirth" id="form-field-1" placeholder="Place of Birth" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Name </label>
										<div class="col-sm-6">
											<input type="text" name="company_name" id="form-field-1" placeholder="Company Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Address </label>
										<div class="col-sm-9">
											<input type="text" name="company_address" id="form-field-1" placeholder="Company Address" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Position </label>
										<div class="col-sm-6">
											<input type="text" name="position" id="form-field-1" placeholder="Position" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Residence Address </label>
										<div class="col-sm-9">
											<input type="text" name="residence_address" id="form-field-1" placeholder="Residence Address" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Number </label>
										<div class="col-sm-6">
											<input type="number" name="mobile_number" id="form-field-1" placeholder="Mobile Number" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Specialization </label>
										<div class="col-sm-6">
											<input type="text" name="specialization" id="form-field-1" placeholder="Specialization" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Other Membership</label>
										<div class="col-sm-6">
											<input type="text" name="membership_other" id="form-field-1" placeholder="Other Membership" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="register">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

									</form>

        </div>
		<?php include('template/script.php'); ?>
    </body>
</html>
