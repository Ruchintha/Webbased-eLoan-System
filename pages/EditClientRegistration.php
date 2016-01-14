<?php
require_once 'database.php';
$id = $_GET['id'];

$sql    = "SELECT * FROM Client_Registration WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eLoan - Loan Mangement System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Date Picker -->
    <link href="../dist/css/datepicker.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.nav-tabs{

			border: 3px solid #337AB7;
			border-top-left-radius: 6px;
			border-top-right-radius: 6px;
			padding-top:10px;
			padding-bottom:1px;
		}
		.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			background-color: #337AB7;
			color: white;
		}

	</style>

</head>
<body>


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <h1> &nbsp <span style="font-size:140%; color:#337AB7"><i>e</i></span>Loan
                    <small>
                        &nbsp Loan Mangament System
                    </small>
                </h1>
            </div>
            <div>
                <span style="font-size:100%; color:#337AB7;"><p></p>
                <p class="bg-primary" align="right"><?php echo "Logged in as ".$_SESSION['id']."&nbsp &nbsp &nbsp &nbsp &nbsp";?></p></span>
                <a class="col-lg-offset-7 col-md-offset-5 btn btn btn-outline btn-md btn-warning" type="button" href="logout.php">Logout</a>
                <p></p>
                <p align="right" class="text-primary bg-primary" id="time"></p>
            </div>
          <!-- /.navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="glyphicon glyphicon-home"></i>&nbsp Welcome Screen</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Administration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Register.php"> User Registration</a>
                                </li>
                                <!--<li>
                                    <a href="accessgroups.php"> Define Access Groups</a>
                                </li>
                                <li>
                                    <a href="groupmembers.php"> Define Group Members</a>
                                </li>
                                <li>
                                    <a href="groupprivileges.php"> Define Group Privilages</a>
                                </li>  -->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Reference<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="OfficerTypes.php">Officer Types</a>
                                </li>
                                <li>
                                    <a href="LoanTypes.php">Loan Types</a>
                                </li>
                                <li>
                                    <a href="CountryStructure.php">Country Structure</a>
                                </li>
                                <li>
                                    <a href="ApplicationStatus.php">Application Status</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Front Office<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ClientRegistration.php">Client Registration</a>
                                </li>
                                <li>
                                    <a href="TrialCalculator.php">Trial Calculator</a>
                                </li>
                                <li>
                                    <a href="LoanApplication.php">Loan Applications</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-briefcase fa-fw"></i> Buisiness Flow<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="LoanApproval.php">Loan Approvals</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-info-circle fa-fw"></i> Information Center<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="PipelineStatus.php">Loan Application Pipeline Status</a>
                                </li>
                                <li>
                                    <a href="RepaymentSchedule.php">Loan Repayment Schedule</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Report Center<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ApplicationPipeline.php">Loan Application Pipeline</a>
                                </li>
                                <li>
                                    <a href="RepaymentReport.php">Loan Repayment Schedule</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <span style="color:#337AB7"><h1 class="page-header">Front Office >
                            <small>
                                Client Registration
                            </small>
                        </h1></span>
                    </div>
						<div class="panel-body">
							<form id="individual" name="individual" method="POST" action="ClientRegistration.php" class="form-horizontal col-md-9 col-md-offset-2">
				                <fieldset>
				                   	<br/>
				   	                <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Title</label>
				                        <div class="col-sm-2">
				                            <select class="form-control" name="title">
                                              <option value="Mrs.">Mrs.</option>
                                    		  <option value="Mr.">Mr.</option>
                                    		  <option value="Miss.">Miss</option>
                                    		  <option value="Rev.">Rev.</option>
                                    		  <option value="Dr.">Dr.</option>
                                		    </select>
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Name With Initials</label>
				                        <div class="col-sm-5">
				                            <input type="text" name="name" class="form-control" value="<?php echo $row['3']?>" required />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">First Name</label>
				                        <div class="col-sm-4">
				                            <input type="text" name="fname" class="form-control" value="<?php echo $row['4']?>" required />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Last Name</label>
				                        <div class="col-sm-4">
				                            <input type="text" name="lname" class="form-control" value="<?php echo $row['5']?>" required  />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Date Of Birth</label>
				                        <div class="col-sm-3">
				                            <input type="date" name="dob" placeholder="  YYYY - MM - DD" class="form-control" value="<?php echo $row['8']?>" required  />
				                        </div>
				                    </div>

				                    <div class="form-group">
					                       <div class="radio">
					                       <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Gender</label>
											<label class="radio-inline">
												<input value="Male" name="gender" class="ace" type="radio">
												<span class="lbl">  Male</span>
											</label>
											<label class="radio-inline">
												<input value="Female" name="gender" class="ace" type="radio">
												<span class="lbl">  Female</span>
											</label>
										</div>
									</div>

									<div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Marital Status</label>
				                        <div class="col-sm-2">
				                        	<select class="form-control" name="marital_stat">
                                    		<option value="Single">Single</option>
                                    		<option value="Married">Married</option>
                                		</select>
				                        </div>
				                    </div>

									<div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">NIC number</label>
				                        <div class="col-sm-3">
				                            <input type="text" name="nic" class="form-control" value="<?php echo $row['11']?>" required />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Passport Number</label>
				                        <div class="col-sm-3">
				                                <input type="text" name="passport_no" class="form-control" value="<?php echo $row['12']?>"  />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Driving License Number</label>
				                        <div class="col-sm-3">
				                                <input type="text" name="driving_license" class="form-control" value="<?php echo $row['13']?>" required />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Permanent Address</label>
				                        <div class="col-sm-5">
				                                <textarea type="text" name="address" class="form-control" required  /> <?php echo $row['14']?></textarea>
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Contact Number</label>
				                        <div class="col-sm-3">
				                                <input type="text" name="tel1" class="form-control" value="<?php echo $row['16']?>" required />
				                        </div>
				                        <div class="col-sm-3 col-sm-offset-4">
			                                   <input type="text" name="tel2" class="form-control" value="<?php echo $row['15']?>"  />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">E-Mail Address</label>
				                        <div class="col-sm-5">
				                                <input type="email" name="email" class="form-control" value="<?php echo $row['18']?>" required />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Security Type</label>
				                        <div class="col-sm-5">
				                                <input type="text" name="security_type" class="form-control" value="<?php echo $row['19']?>" />
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Description</label>
				                        <div class="col-sm-5">
				                                <textarea type="text" name="description" class="form-control"> <?php echo $row['20']?></textarea>
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Market Value</label>
				                        <div class="col-sm-5">
				                                <input type="text" name="market_value" class="form-control"  value="<?php echo $row['21']?>"  />
				                        </div>
				                    </div>

				                        <br/>
				                    <div>
				                  		<input type="hidden" name="status" value="Individual"></input>
				                        <button type="submit" name="update" value="update" class="col-sm-offset-2 col-sm-4 btn btn-outline btn-md btn-success">Register</button>
				                        <button type="reset" class="col-sm-3 col-sm-offset-1 btn btn-outline btn-md btn-warning">Reset</button>
				                  	</div>
				                </fieldset>
				                <br/>
				                <br/>
				            </form></p>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Date Picker -->
    <script src="../js/bootstrap-datepicker.js"></script>

    <script src="../dist/js/date.js"></script>

    <script>
        window.onload = function () {
            startTime();
        }
    </script>
</body>

</html>
