<?php
//iniatilize all the data

include('template/header.php');

//database class
include('lib/class.php'); 

//validator
require "lib/gump.class.php";
$validator = new GUMP();

if (isset($_POST['register']) && $_POST['csrftoken']=='jaSf3829nFjaSdf832rjNsdf')
{
$_POST = array(
	'username' 	  => $_POST['username'],
	'password' 	  => $_POST['password'],
	'fname'	      => $_POST['fname'],
	'lname'   	  => $_POST['lname']

);
//sanitize
$_POST = $validator->sanitize($_POST);

$filters = array(
	'username' 	  => 'trim|sanitize_string',
	'password'	  => 'trim',
	'fname'    	  => 'trim|sanitize_string',
	'lname'   	  => 'trim|sanitize_string'
);

$rules = array(
	'username' 	  => 'required|alpha_numeric|max_len,100|min_len,6',
	'password'	  => 'required|max_len,100|min_len,6',
	'fname'    	  => 'required',
	'lname'   	  => 'required'
);

$data = $validator->filter($_POST, $filters);
$validated = $validator->validate($data, $rules);

try
		{
$query = $conn->prepare("SELECT username FROM user WHERE username=:username");
$query->execute(array(':username'=>$_POST['username']));	
$row = $query->fetch();
if($row['username']==$_POST['username']) {
				$error[] = "Sorry username already taken!";
			} 
			else
			{
			if($validated === TRUE){
				if($system->register($data['username'],$data['password'],$data['fname'],$data['lname'])){
					
					$system->redirect('register.php?joined');
				}else{
					$system->redirect('register.php?error');
				}
			}
				else{
					$system->redirect('register.php?invalid');
				}
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

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post">

									<input type="hidden" name="csrftoken" id="form-field-1" value="jaSf3829nFjaSdf832rjNsdf" class="col-xs-10 col-sm-5" />
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

										<div class="col-sm-9">
											<input type="text" name="username" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" pattern=".{6,}" title="Six or more characters"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

										<div class="col-sm-9">
											<input type="password" name="password" id="form-field-1"  class="col-xs-10 col-sm-5" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>

										<div class="col-sm-9">
											<input type="text" name="fname" id="form-field-1" placeholder="First Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-9">
											<input type="text" name="lname" id="form-field-1" placeholder="Last Name" class="col-xs-10 col-sm-5" />
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
                      <i class="fa fa-info"></i> &nbsp; Successfully registered <a href='register.php'>add data</a> here
                 </div>
                 <?php
			}
			else if(isset($_GET['invalid']))
			{
				 ?>
                 <div class="alert alert-danger">
                      <i class="fa fa-info"></i> &nbsp; Invalid Characters <a href='register.php'>add data</a> here
                 </div>
                 <?php
			}
			?>
									</form>
<!--
        <div class="form-box" id="login-box">
             <div class="header"><i class="fa fa-sign-in"></i> Register</div> 	
            <form method="post" id="register_form">
                <div class="body bg-gray">
					
	<hr class="hr">
	<div class="form-group">
	<label>Username</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="text"  name="username" class="form-control"  placeholder="" required>
      <input type="hidden"  name="csrftoken" class="form-control"  value="jaSf3829nFjaSdf832rjNsdf" required>
    </div>
	</div>
	<div class="form-group">
	<label>Password</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-key"></i></div>
      <input type="password"  name="password" class="form-control"  placeholder="" required>
    </div>
	</div>
	<div class="form-group">
	<label>First Name</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="text"  name="fname" class="form-control"  placeholder="" required>
    </div>
	</div>
	<div class="form-group">
	<label>Last Name</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="text"  name="lname" class="form-control"  placeholder="" required>
    </div>
	</div>
    
                </div>
                <div class="footer bg_grey1">                                                               
                <button type="submit" name="register" class="btn bg-olive btn-block"><i class="fa fa-sign-in"></i> Register</button>  
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
                      <i class="fa fa-info"></i> &nbsp; Successfully registered <a href='register.php'>add data</a> here
                 </div>
                 <?php
			}
			?>

               
			   </div>

            </form>
		-->	
			<!--
					<script>
						jQuery(document).ready(function(){
						$('#error').hide()
						$('#exist').hide()
						$('#correct').hide()
						jQuery("#register_form").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "reg.php",
									data: formData,
									success: function(html){
									if(html=='true' )
									{
										$('#error').hide();
										$("#correct").slideDown();
										var delay = 2000;
										setTimeout(function(){	window.location = 'register.php';   }, delay);  
									}else if (html == 'exist')
									{
									$('#exist').slideDown();	
										var delay = 3000;
										setTimeout(function(){	$('#error').slideUp();  }, delay);  
									}
									else{
									$('#error').slideDown();	
										var delay = 3000;
										setTimeout(function(){	$('#error').slideUp();  }, delay);  
									}
									}
								});
									return false;
						});
						});
						</script>-->
        </div>
		<?php include('template/script.php'); ?>
    </body>
</html>