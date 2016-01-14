<?php session_start();
require_once 'database.php';
if (!isset($_SESSION['id'])) {
	header("location:login.php");
}
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
                        <span style="color:#337AB7"><h1 class="page-header">Front Office
                            <small>

                            </small>
                        </h1></span>
                    </div>
                    <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs ">
                                <li class="col-sm-offset-1"><a aria-expanded="true" href="#individual" data-toggle="tab">Individual</a>
                                </li>
                                <li class=""><a aria-expanded="false" href="#cooperate" data-toggle="tab">Cooperate</a>
                                </li>
                                <a class="btn btn-primary col-lg-offset-6 col-md-offset-5" href="ClientRegistration.php" ><i class="fa fa-arrow-circle-right "></i> Register</a>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="individual">
                                    <h4></h4>                                                                   <!-- /.panel-heading -->
                               <div class="panel-body">
                                   <div class="dataTable_wrapper">
                                       <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="dataTables-example_wrapper">
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   <div id="dataTables-example_length" class="dataTables_length"></div>
                                               </div>
                                           </div>
                                               <div class="row">
                                                    <div>

                                            <div class="panel-heading">Male Clients</div>
                                                    <table role="grid" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                        <thead style="color:#337AB7">
                                                            <tr role="row">
                                                            <th>Name</th>
                                                            <th width="10%">NIC/Passport/Driving License Numbers</th>
                                                            <th>Address</th>
                                                            <th style="width:169px">Contact Details</th>
                                                            <th>Security Type</th>
                                                            <th>Description</th>
                                                            <th>Gender</th>

                                                        </thead>
<?php
include 'database.php';
$sql    = "SELECT * FROM Client_Registration WHERE gender='Male'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
	?>
																				     <tbody>
																					    <tr role="row">
																						   <td><?php echo $row['name'];?></td>
									                                                       <td>NIC-<?php echo $row['nic'];?><br/>
																						      Passport-<?php echo $row['passport_no'];?><br/>
																						      Driving-<?php echo $row['driving_license'];?></td>
									                                                        <td><?php echo $row['address'];?></td>
									                                                        <td><?php echo $row['email'];?><br/>
																						      Tel.Number-<?php echo $row['tel1'];?><br/>
																						      Tel.Number-<?php echo $row['tel2'];?> </td>
									                                                        <td><?php echo $row['security_type'];?></td>
									                                                        <td><?php echo $row['description'];?></td>
			                                                                                <td><?php echo $row['gender'];?></td>
									                                                        <td><a class="btn btn-primary btn-sm" href="EditClientRegistration.php?id=<?php echo $row['id'];?>"> Edit <a><br/><br/>
																                                 <a class="btn btn-info btn-sm"  href="ClientPrint.php?id=<?php echo $row['id'];?>"> Print <a></td>
									                                                    </tr>
																					</tbody>
	<?php
}
?>
</table>
                                                <div class="panel-heading">Female Clients</div>
                                                    <table role="grid" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                        <thead style="color:#337AB7">
                                                            <tr role="row">
                                                            <th>Name</th>
                                                            <th width="10%">NIC/Passport/Driving License Numbers</th>
                                                            <th>Address</th>
                                                            <th style="width:169px">Contact Details</th>
                                                            <th>Security Type</th>
                                                            <th>Description</th>
                                                            <th>Gender</th>

                                                        </thead>
<?php
include 'database.php';
$sql    = "SELECT * FROM Client_Registration WHERE gender='Female'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
	?>
						                                                         <tbody>
						                                                            <tr role="row">
						                                                               <td><?php echo $row['name'];?></td>
						                                                               <td>NIC-<?php echo $row['nic'];?><br/>
						                                                                  Passport-<?php echo $row['passport_no'];?><br/>
						                                                                  Driving-<?php echo $row['driving_license'];?></td>
						                                                                <td><?php echo $row['address'];?></td>
						                                                                <td><?php echo $row['email'];?><br/>
						                                                                  Tel.Number-<?php echo $row['tel1'];?><br/>
						                                                                  Tel.Number-<?php echo $row['tel2'];?> </td>
						                                                                <td><?php echo $row['security_type'];?></td>
						                                                                <td><?php echo $row['description'];?></td>
					                                                                    <td><?php echo $row['gender'];?></td>
						                                                                <td><a class="btn btn-primary btn-sm" href="EditClientRegistration.php?id=<?php echo $row['id'];?>"> Edit <a><br/><br/>
						                                                                     <a class="btn btn-info btn-sm"  href="ClientPrint.php?id=<?php echo $row['id'];?>"> Print <a></td>
						                                                            </tr>
						                                                        </tbody>
	<?php
}
?>
</table>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="cooperate">
                                    <h4></h4>

                               <!-- /.panel-heading -->
                               <div class="panel-body">
                                   <div class="dataTable_wrapper">
                                       <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="dataTables-example_wrapper">
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   <div id="dataTables-example_length" class="dataTables_length"></div>
                                               </div>
                                           </div>
                                               <div class="row">
                                                    <div class="col-sm-12">
                                                    <table role="grid" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                        <thead style="color:#337AB7">
                                                            <tr role="row">
                                                            <th>Company Name</th>
                                                            <th>Company Registration Number</th>
                                                            <th>Business Address</th>
                                                            <th>Contact Numbers</th>
                                                            <th>E-Mail Address</th>
                                                            <th>Security Type</th>
                                                            <th>Description</th>
                                                            <th>Market Value</th>

                                                        </thead>
<?php

$sql    = "SELECT * FROM Client_Registration WHERE status='cooperate'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {?>
																					<tbody>
																					     <tr role="row">
																					        <td><?php echo $row['company_name'];?></td>
																					        <td><?php echo $row['company_registration_no'];?></td>
																					        <td><?php echo $row['business_address'];?></td>
																							<td>Tel -<?php echo $row['tel1'];?><br/>
																					          Tel -<?php echo $row['te2'];?></td>
																							<td><?php echo $row['email'];?><br/></td>
																							<td><?php echo $row['security_type'];?></td>
									                                                        <td><?php echo $row['description'];?></td>
									                                                        <td><?php echo $row['market_value'];?></td>
																					     </tr>
																					</tbody>
	<?php
}
?>
</table>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
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
