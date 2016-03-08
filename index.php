<?php 
ob_start();
session_start();

include('header.php');

require_once 'lib/class.php';


if(isset($_POST['btn-login']))
{

	@$username = $_POST['username'];
	@$password = $_POST['password'];
	@$salt = '$$$$$';
	@$hash=hash_hmac('sha512', $salt, $password);
		
	if($system->login($username,$hash))
	{	
		$system->redirect('home#?=login');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
if(@$_GET['logout']=='true'){
		$_SESSION = array();
        session_destroy();
       }
?>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Login</span>
									<span class="white" id="id-text2">Application</span>
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

											<div class="space-6"></div>

											<form method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username"class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password"class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" name="btn-login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
		
													</div>
		
													<div class="space-4"></div>
														<?php
													if(isset($error))
													{
					 										?>
                     										<div class="alert alert-danger">
                        										<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                     										</div>
                     										<?php
													}
													?>	
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
		<?php include('script.php'); ?>
    </body>
</html>