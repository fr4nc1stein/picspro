<?php
ob_start();
session_start();

include('template/header.php');

require_once 'lib/class.php';


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

									$system->redirect('index.php?joined');
								}else{
									$system->redirect('index.php?error');
								}
							}
							catch(PDOException $e)
							{
								echo $e->getMessage();
							}
}
?>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Registration</span>
									<span class="white" id="id-text2">System</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy;PICSPro</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information


											</h4>
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
													<i class="fa fa-info"></i> &nbsp; Successfully registered <a href='index.php'>add data</a> here
										 </div>
										 <?php
					}
					else if(isset($_GET['invalid']))
					{
						 ?>
										 <div class="alert alert-danger">
													<i class="fa fa-info"></i> &nbsp; Invalid Characters <a href='index.php'>add data</a> here
										 </div>
										 <?php
					}
					?>

											<div class="space-6"></div>

											<form method="post" class="form-horizontal">
												<fieldset>
												<div class="form-group">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
																<input type="hidden" name="csrftoken" id="form-field-1" value="jaSf3829nFjaSdf832rjNsdf" class="col-xs-10 col-sm-5" />
															<input type="email" name="email_address"class="form-control" placeholder="Email Address" required/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													</div>
												<!-- Membership -->
													<label class="block clearfix">
													 Membership Type:
													</label>
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



												<div class="form-group">
												<!-- Gender -->
												<label class="block clearfix">
													 Gender:
												</label>
													<select class="col-xs-10 col-sm-5" id="form-field-select-1" name="gender">
																<option>Male</option>
																<option>Female</option>
													</select>
												</div>



												<!-- Lastname-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="lastname" id="form-field-1" placeholder="Last Name" class="col-xs-10" required/>*
												</label>
												</div>



												<!-- Firstname-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="firstname" id="form-field-1" placeholder="First Name" class="col-xs-10" required/>*
												</label>
												</div>



												<!-- Middlename-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="middlename" id="form-field-1" placeholder="Middle Name" class="col-xs-10"/>
												</label>
												</div>

												<!-- BD-->
												<div class="form-group">
												<label class="block clearfix">Date of Birth</label>
												<div class="input-group">
													<input class="form-control date-picker" id="id-date-picker-1" type="text" name="birthday" data-date-format="yyyy-mm-dd" />
														<span class="input-group-addon">
															<i class="fa fa-calendar bigger-110"></i>
														</span>
												</div>
												</div>

												<!-- Place of Birth-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="placeofbirth" id="form-field-1"  placeholder="Place of Birth" class="form-control"/>
												</label>
												</div>

												<!-- Company name-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="company_name" id="form-field-1"  placeholder="Company Name" class="form-control"/>
												</label>
												</div>

												<!-- Company Address-->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="company_address" id="form-field-1"  placeholder="Company Address" class="form-control"/>
												</label>
												</div>

												<!--Position -->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="position" id="form-field-1"  placeholder="Position" class="form-control"/>
												</label>
												</div>

												<!--Residence -->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="residence_address" id="form-field-1"  placeholder="Residence Address" class="form-control"/>
												</label>
												</div>

												<!--Mobile Number -->
												<div class="form-group">
												<label class="block clearfix">
												<input type="number" name="mobile_number" id="form-field-1"  placeholder="Mobile Number" class="form-control"/>
												</label>
												</div>

												<!--Specialization -->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="specialization" id="form-field-1"  placeholder="Specialization" class="form-control"/>
												</label>
												</div>

												<!--Specialization -->
												<div class="form-group">
												<label class="block clearfix">
												<input type="text" name="membership_other" id="form-field-1"  placeholder="Membership to other Organization" class="form-control"/>
												</label>
												</div>


												<div class="space-6"></div>



														<button type="submit" name="register" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Register</span>
														</button>

													</div>

													<div class="space-4"></div>

												</fieldset>
											</form>



										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->



									</div><!-- /.widget-body -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
  </div>
  <!-- /.login-box-body -->
	</div>
</form>



</div>
		<?php include('template/script.php'); ?>
    </body>
</html>
