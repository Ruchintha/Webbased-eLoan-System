<?php
require_once 'database.php';
if (isset($_POST['username'])) {
	$sqltest  = "SELECT username FROM Login_users where username='".$_POST['username']."' ";
	$result   = mysqli_query($conn, $sqltest);
	$num_rows = mysqli_num_rows($result);

	if ($num_rows == 0) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$name     = $_POST['name'];
		$sql      = "INSERT INTO Login_users(username,password,name)
		VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['name']."') ";

		if (mysqli_query($conn, $sql)) {
			echo '<div class="alert alert-block alert-success">
					<i class="ace-icon fa fa-check green"></i>
					&nbsp; New user created successfully
					</div>';
		} else {
			echo '<div class="alert alert-block alert-warning">
					<i class="ace-icon fa fa-remove red"></i>
					&nbsp; Failed to crated new user
					</div>';
		}
		if (password != password2) {
			echo '<div class="alert alert-block alert-warning">
					<i class="ace-icon fa fa-remove red"></i>
					&nbsp; Passwords do not match, please try again
					</div>';}

	} else {
		echo '<div class="alert alert-block alert-warning">
					<i class="ace-icon fa fa-remove red"></i>
					&nbsp; Username already exists
					</div>';
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>User Registration</title>

		<meta name="description" content="User registration page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="blue">eLoan</span>
									<span class="white" id="id-text2">- User Registration</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form name="f1" method="POST" action="register.php" onsubmit="return matchpassword()">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control" placeholder="First Name" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-at"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password2" class="form-control" placeholder="Confirm Password" />
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-60 pull-right btn btn-sm btn-success">
															<i class="ace-icon fa fa-check"></i>
															<span class="bigger-110">Register</span>
														</button>

														<button type="reset" class="width-30 pull-left btn btn-sm btn-primary">
															<i class="ace-icon fa fa-retweet"></i>
															<span class="bigger-110">Reset</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
</html>
