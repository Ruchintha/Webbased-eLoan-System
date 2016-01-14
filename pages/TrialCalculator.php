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
                                Trial Calculator
                            </small>
                        </h1></span>
                    </div>
<?php
$loan_amount  = $_POST['loan_amount'];
$rate         = $_POST['rate'];
$installments = $_POST['installments'];

$monthlyRate = ($rate/100.0)/12;
$payment     = ($monthlyRate*$loan_amount)/(1-((1/(1+$monthlyRate))**$installments));

?>
<form  method="POST" action="TrialCalculator.php" class="form-horizontal col-md-8 col-md-offset-2">
                                <fieldset>
                                <br/>
                                    <div class="form-group">
                                      <label style="font-weight:200" class="col-sm-3 control-label no-padding-right">Loan Types</label>
                                      <div class="col-sm-5 col-lg-4">
	                                       <select class="form-control" name="loan_type">
<?php
$sql    = "SELECT * FROM Loan_Types";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
	echo "<option value='".$row['loan_code']."'>".$row['description']."<option>";
}
?>
</select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-3 control-label no-padding-right">Loan Amount</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="loan_amount" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label style="font-weight:200" class="col-sm-3 control-label no-padding-right">Annual Intrest Rate</label>
                                      <div class="col-sm-5">
                                        <input type="text" name="rate" class="form-control" required />
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label style="font-weight:200" class="col-sm-3 control-label no-padding-right">Number of Installments</label>
                                      <div class="col-sm-5">
                                        <input type="text" name="installments" class="form-control" required />
                                      </div>
                                    </div>

                                    <br/>
                                    <div>
                                        <button type="submit" class=" col-sm-4 btn btn-outline btn-md btn-success">Calculate</button>
                                        <button type="reset" class="col-sm-3 col-sm-offset-1 btn btn-outline btn-md btn-warning">Reset</button>
                                        <button type="button" class="col-sm-offset-1 btn btn-outline btn-md btn-primary" onClick="window.print()" value="Print This Page">Print</button>
                                    </div>
                                </fieldset>
                            </form>
                         <!-- /.col-lg-12 -->
                    </div><br/><br/>
<?php
echo "Monthly Payment &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp Rs.", round($payment, 2);
echo "<br/>";
echo "Total Interest Amount  &nbsp &nbsp &nbsp : &nbsp &nbsp Rs.", round(($payment*$installments)-$loan_amount, 2);
echo "<br/>";
echo "<br/>";
?>
<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
					    <thead>
					        <tr>
					            <th width="10">#</th>
					            <th>Amount</th>
					            <th>Principle</th>
					            <th>Intrest</th>
								<th>Balance</th>
					        </tr>
					    </thead>
					    <tbody>
<?php for ($i = 1; $i <= $installments; $i++) {
	$interest = round($loan_amount*$monthlyRate, 2);
	$rental   = round($payment-$interest, 2);
	$loan_amount -= $rental;
	$principle = round($interest+$rental, 2);
	$balance   = round($loan_amount, 2);
	?>
																																																	<tr align="right">
																																																	    <td><?php echo "$i";?></td>
																																																	    <td><?php echo "Rs. $principle";?></td>
																																																	    <td><?php echo "Rs. $rental";?></td>
																																																	    <td><?php echo "Rs. $interest";?></td>
																																																	    <td><?php echo "Rs. $balance";?></td>
																																																	</tr>
	<?php }
?>
						</tbody>
					</table>
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