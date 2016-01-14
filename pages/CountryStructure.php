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
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <p class="bg-primary" align="right"><?php echo "Logged in as " . $_SESSION['id'] . "&nbsp &nbsp &nbsp &nbsp &nbsp";?></p></span>
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
                        <span style="color:#337AB7"><h1 class="page-header">Reference >
                            <small>
                                Country Structure
                            </small>
                        </h1></span>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class=""><a aria-expanded="false" href="#province" data-toggle="tab">Provinces</a>
                                </li>
                                <li class=""><a aria-expanded="false" href="#district" data-toggle="tab">Districs</a>
                                </li>
                                <li class=""><a aria-expanded="false" href="#postal_code"data-toggle="tab">Postal Code</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                                <div class="tab-pane fade active in col-lg-6 col-lg-offset-2" id="province">
                                    <h4> </h4>
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th width="100px">Province ID</th>
                                                <th width="100px">Code</th>
                                                <th width="200px">Description</th>
                                            </tr>
                                        </thead>

<?php
include 'database.php';
$sql = "SELECT * FROM Provinces";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
	?>
				                                                            <tbody>
				                                                                <tr role="row">
				                                                                    <td><?php echo $row['province_id'];?></td>
				                                                                    <td><?php echo $row['code'];?></td>
				                                                                    <td><?php echo $row['description'];?></td>
				                                                                </tr>
				                                                            </tbody>
	<?php
}
?>
</table>
                                </div>

                                <div class="tab-pane fade col-lg-6 col-lg-offset-2" id="postal_code">
                                    <h4> </h4>
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Postal Code ID</th>
                                                <th>District Code</th>
                                                <th>Postal Code</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
<?php
include 'database.php';
$sql = "SELECT * FROM Postal_Code";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
	?>
			                                                                <tbody>
			                                                                    <tr role="row">
			                                                                        <td><?php echo $row['postal_code_id'];?></td>
			                                                                        <td><?php echo $row['district_code'];?></td>
			                                                                        <td><?php echo $row['postal_code'];?></td>
			                                                                        <td><?php echo $row['description'];?></td>
			                                                                    </tr>
			                                                                </tbody>
	<?php
}
?>
</table>
                                </div>

                                <div class="tab-pane fade col-lg-6 col-lg-offset-2" id="district">
                                    <h4> </h4>
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>District ID</th>
                                                <th>Province Code</th>
                                                <th>District Code</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>

<?php
include 'database.php';
$sql = "SELECT * FROM Districts";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
	?>
			                                                                <tbody>
			                                                                    <tr role="row">
			                                                                        <td><?php echo $row['district_id'];?></td>
			                                                                        <td><?php echo $row['province_code'];?></td>
			                                                                        <td><?php echo $row['district_code'];?></td>
			                                                                        <td><?php echo $row['description'];?></td>
			                                                                    </tr>
			                                                                </tbody>
	<?php
}
?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
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

    <script src="../dist/js/date.js"></script>

    <script>
        window.onload = function () {
            startTime();
        }
    </script>

</body>

</html>