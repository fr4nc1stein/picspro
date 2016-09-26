<?php
//iniatilize all the data

include('template/header.php');

//database class
include('../lib/class.php');

//validator
require "../lib/gump.class.php";
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


						<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue"></h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Results for "Members"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Email</th>
														<th>Full Name</th>
														<th class="hidden-480">Gender</th>

														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Date of Birth
														</th>
														<th class="hidden-480">Registration Date</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php
												$query = $conn->prepare("SELECT * FROM  member");
												$query->execute();
												while($row = $query->fetch()){
												?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?php echo $row['email_address'] ?></a>
														</td>
														<td><?php echo $row['firstname']. " " .$row['middlename']. " " .$row['lastname']; ?></td>
														<td class="hidden-480"><?php echo $row['gender']; ?></td>
														<td><?php echo $row['birthday']; ?></td>

														<td class="hidden-480">
															<span class="label label-sm label-warning"><?php echo $row['date_registration'];?></span>
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php }?>	
												</tbody>
											</table>
													
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

		<?php include('template/footer-script.php'); ?>
    </body>
</html>
