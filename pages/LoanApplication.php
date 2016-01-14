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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #income{
            padding-left: 0px;
            padding-right: 8px;
        }
        #exp{
            padding-left: 8px;
            padding-right: 0px;
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
                                Loan Applications
                            </small>
                        </h1></span>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<?php
require_once 'database.php';

if (isset($_POST['submit'])) {

	$loan_amount                = $_POST['loan_amount'];
	$repayment_period           = $_POST['repayment_period'];
	$loan_type                  = $_POST['loan_type'];
	$purpose                    = $_POST['purpose'];
	$security_offered           = $_POST['security_offered'];
	$title                      = $_POST['title'];
	$name                       = $_POST['name'];
	$fname                      = $_POST['fname'];
	$dob                        = $_POST['dob'];
	$age                        = $_POST['age'];
	$marital_stat               = $_POST['marital_stat'];
	$gender                     = $_POST['gender'];
	$nationality                = $_POST['nationality'];
	$nic                        = $_POST['nic'];
	$dependants                 = $_POST['dependants'];
	$academic                   = $_POST['academic'];
	$professional               = $_POST['professional'];
	$field                      = $_POST['field'];
	$address                    = $_POST['address'];
	$period_address             = $_POST['period_address'];
	$mobile_number              = $_POST['mobile_number'];
	$fixed_line                 = $_POST['fixed_line'];
	$email                      = $_POST['email'];
	$off_address                = $_POST['off_address'];
	$office_number              = $_POST['office_number'];
	$industry                   = $_POST['industry'];
	$sector                     = $_POST['sector'];
	$designation                = $_POST['designation'];
	$experience                 = $_POST['experience'];
	$salary                     = $_POST['salary'];
	$other_income               = $_POST['other_income'];
	$total                      = $_POST['total'];
	$loan_repayment             = $_POST['loan_repayment'];
	$household                  = $_POST['household'];
	$other                      = $_POST['other'];
	$total_exp                  = $_POST['total_exp'];
	$security_type              = $_POST['security_type'];
	$description                = $_POST['description'];
	$market_value               = $_POST['market_value'];
	$any_other_loans            = $_POST['any_other_loans'];
	$guarantors_one_name        = $_POST['guarantors_one_name'];
	$guarantors_one_fname       = $_POST['guarantors_one_fname'];
	$guarantors_one_address     = $_POST['guarantors_one_address'];
	$guarantors_one_number      = $_POST['guarantors_one_number'];
	$guarantors_one_nic         = $_POST['guarantors_one_nic'];
	$guarantors_one_sector      = $_POST['guarantors_one_sector'];
	$guarantors_one_off_address = $_POST['guarantors_one_off_address'];
	$guarantors_one_off_number  = $_POST['guarantors_one_off_number'];
	$guarantors_one_industry    = $_POST['guarantors_one_industry'];
	$guarantors_one_designation = $_POST['guarantors_one_designation'];
	$guarantors_one_assets      = $_POST['guarantors_one_assets'];
	$guarantors_two_name        = $_POST['guarantors_two_name'];
	$guarantors_two_fname       = $_POST['guarantors_two_fname'];
	$guarantors_two_address     = $_POST['guarantors_two_address'];
	$guarantors_two_number      = $_POST['guarantors_two_number'];
	$guarantors_two_nic         = $_POST['guarantors_two_nic'];
	$guarantors_two_sector      = $_POST['guarantors_two_sector'];
	$guarantors_two_off_address = $_POST['guarantors_two_off_address'];
	$guarantors_two_off_number  = $_POST['guarantors_two_off_number'];
	$guarantors_two_industry    = $_POST['guarantors_two_industry'];
	$guarantors_two_designation = $_POST['guarantors_two_designation'];
	$guarantors_two_assets      = $_POST['guarantors_two_assets'];
	$application_status         = $_POST['application_status'];

	$sql = "INSERT INTO Loan_Application(loan_amount,repayment_period,loan_type,purpose,security_offered,title,name,fname,dob,age,marital_stat,gender,nationality,nic,dependants,academic,professional,field,address,period_address,mobile_number,fixed_line,email,off_address,office_number,industry,sector,designation,experience,salary,other_income,total,loan_repayment,household,other,total_exp,security_type,description,market_value,any_other_loans,guarantors_one_name,guarantors_one_fname,guarantors_one_address,guarantors_one_number,guarantors_one_nic,guarantors_one_sector,guarantors_one_off_address,guarantors_one_off_number,guarantors_one_industry,guarantors_one_designation,guarantors_one_assets,guarantors_two_name,guarantors_two_fname,guarantors_two_address,guarantors_two_number,guarantors_two_nic,guarantors_two_sector,guarantors_two_off_address,guarantors_two_off_number,guarantors_two_industry,guarantors_two_designation,guarantors_two_assets,application_status)
        VALUES ('".$_POST['loan_amount']."','".$_POST['repayment_period']."','".$_POST['loan_type']."','".$_POST['purpose']."','".$_POST['security_offered']."','".$_POST['title']."','".$_POST['name']."','".$_POST['fname']."','".$_POST['dob']."','".$_POST['age']."','".$_POST['marital_stat']."','".$_POST['gender']."','".$_POST['nationality']."','".$_POST['nic']."','".$_POST['dependants']."','".$_POST['academic']."','".$_POST['professional']."','".$_POST['field']."','".$_POST['address']."','".$_POST['period_address']."','".$_POST['mobile_number']."','".$_POST['fixed_line']."','".$_POST['email']."','".$_POST['off_address']."','".$_POST['office_number']."','".$_POST['industry']."','".$_POST['sector']."','".$_POST['designation']."','".$_POST['experience']."','".$_POST['salary']."','".$_POST['other_income']."','".$_POST['total']."','".$_POST['loan_repayment']."','".$_POST['household']."','".$_POST['other']."','".$_POST['total_exp']."','".$_POST['security_type']."','".$_POST['description']."','".$_POST['market_value']."','".$_POST['any_other_loans']."','".$_POST['guarantors_one_name']."','".$_POST['guarantors_one_fname']."','".$_POST['guarantors_one_address']."','".$_POST['guarantors_one_number']."','".$_POST['guarantors_one_nic']."','".$_POST['guarantors_one_sector']."','".$_POST['guarantors_one_off_address']."','".$_POST['guarantors_one_off_number']."','".$_POST['guarantors_one_industry']."','".$_POST['guarantors_one_designation']."','".$_POST['guarantors_one_assets']."','".$_POST['guarantors_two_name']."','".$_POST['guarantors_two_fname']."','".$_POST['guarantors_two_address']."','".$_POST['guarantors_two_number']."','".$_POST['guarantors_two_nic']."','".$_POST['guarantors_two_sector']."','".$_POST['guarantors_two_off_address']."','".$_POST['guarantors_two_off_number']."','".$_POST['guarantors_two_industry']."','".$_POST['guarantors_two_designation']."','".$_POST['guarantors_two_assets']."','".$_POST['application_status']."') ";

	if (mysqli_query($conn, $sql)) {
		echo '<div class="alert alert-block alert-success">
            <i class="fa fa-check green"></i>
            &nbsp; Created successfully
        </div>';
	} else {
		echo '<div class="alert alert-block alert-danger">error:<br>
        <i class="fa fa-remove red"></i>
         &nbsp; Failed to Create New Entry
        </div>';
	}
}
mysqli_close($conn);
?>
                <form name="loanTypes" method="POST" action="LoanApplication.php" class="form-horizontal">
                    <fieldset>
                        <br/>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="" aria-expanded="true" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Loan Information</a>
                                </h4>
                            </div>
                            <div style="" aria-expanded="true" id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Loan Amount</label>
                                        <div class="form-group input-group col-sm-4">
                                            <span class="input-group-addon">Rs.</span>
                                            <input class="form-control" placeholder="" name="loan_amount" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Repayment Period</label>
                                        <div class="form-group input-group col-sm-2">
                                            <input class="form-control" placeholder="" name="repayment_period" type="text">
                                            <span class="input-group-addon">Years</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Loan Type</label>
                                        <div class="form-group col-md-3 col-lg-3">
                                            <select class="form-control" name="loan_type">
                                                <option value="EDU">Educational Loan</option>
                                                <option value="HOU">Houding Loan</option>
                                                <option value="VEH">Vehicle Loan</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Purpose</label>
                                        <div class="form-group col-sm-3 col-lg-2">
                                            <select class="form-control" name="purpose">
                                            <option value="Investment">Investment</option>
                                            <option value="Loan2">Loan2</option>
                                            <option value="Loan 3">Loan3</option>
                                            <option value="Loan4">Loan4</option>
                                            <option value="Laon5">Loan5</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Security Offered</label>
                                        <div class="form-group col-sm-4">
                                            <input class="form-control" placeholder="" name="security_offered" type="text" required>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Personal Information</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">

                                <div class="form-group">
                                    <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Title</label>
                                        <div class="form-group col-sm-2">
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
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Name with Initials</label>
                                        <div class="form-group col-sm-5 col-lg-3">
                                            <input class="form-control" placeholder="" name="name" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Full Name</label>
                                        <div class="form-group col-sm-5 col-sm-4">
                                            <input class="form-control" placeholder="" name="fname" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Date Of Birth</label>
                                        <div class="input-group date col-sm-3 col-lg-2" data-provide="datepicker">
                                            <input type="text" name="dob" class="form-control" data-date-format="yyyy/mm/dd">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Age</label>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="age" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Marital Status</label>
                                        <div class=" col-sm-2 form-group">
                                            <select class="form-control" name="marital_stat">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="radio">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Gender</label>
                                            <label class="radio-inline ">
                                                <input value="Male" name="gender" class="ace" type="radio">
                                                &nbsp &nbsp &nbsp &nbsp
                                                <span class="lbl">  Male</span>
                                            </label>
                                            <label class="radio-inline">
                                                &nbsp &nbsp
                                                <input value="Female" name="gender" class="ace" type="radio">
                                                <span class="lbl">  Female</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Nationality</label>
                                        <div class="col-sm-3 form-group">
                                            <input class="form-control" placeholder="" name="nationality" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">NIC, Passport or Driving License Number</label>
                                        <div class="col-sm-3 form-group">
                                            <input class="form-control" placeholder="" name="nic" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Number of Dependants</label>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="dependants" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Educational And Professional Informtion</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Academic</label>
                                        <div class=" col-sm-4 col-lg-3 form-group">
                                            <select class="form-control" name="academic">
                                                <option value="GCE A/L">GCE A/L Passed</option>
                                                <option value="GCE O/L">GCE O/L Only</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Professional</label>
                                        <div class="col-sm-3 col-lg-2 form-group">
                                            <select class="form-control" name="professional">
                                                <option value="Diploma">Diploma</option>
                                                <option value="asd">asdasd</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">In the field of</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="field" type="text" >
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Contact Information</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Current Address</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="" name="address" type="text" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Period in above Address</label>
                                        <div class="col-sm-2">
                                            <div class="form-group input-group">
                                                <input class="form-control" placeholder="" name="period_address" type="text" required>
                                                <span class="input-group-addon">Years</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Mobile Number</label>
                                        <div class="col-sm-3 col-lg-2">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                                <input class="form-control" placeholder="" name="mobile_number" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Fixed Line</label>
                                        <div class="col-sm-3 col-lg-2">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                <input class="form-control" placeholder="" name="fixed_line" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">E-Mail</label>
                                        <div class="col-sm-4 col-lg-3">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="email" type="email" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Employee Information</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Address</label>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="" name="off_address" type="text" required ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Contact Number</label>
                                        <div class="col-sm-3 col-lg-2">
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input class="form-control" placeholder="" name="office_number" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Industry</label>
                                        <div class=" col-sm-3 col-lg-2 form-group">
                                            <select class="form-control" name="industry">
                                                <option value="Trading">Trading</option>
                                                <option value="asd">asdasd</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Sector</label>
                                        <div class=" col-sm-3 col-lg-2 form-group">
                                            <select class="form-control" name="sector">
                                                <option value="Govt/Semi Govt">Govt/Semi Govt</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Your Designation</label>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="designation" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Length of Experience</label>
                                        <div class="col-sm-2">
                                            <div class="form-group input-group">
                                                <input class="form-control" placeholder="" name="experience" type="text" required>
                                                <span class="input-group-addon">Years</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Monthly Income / Expenditure</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">

                                <div id="income" class="col-sm-6 ">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Income (per month)
                                        </div>

                                        <div class="panel-body">
                                        <br/><br/>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Salary</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="salary" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Other Income</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="other_income" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Total</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="total" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>

                                <div id="exp" class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Expenditure (per month)
                                        </div>
                                        <div class="panel-body">

                                        <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Loan Repayment</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="loan_repayment" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Household</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="household" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Other</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="other" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-5 control-label no-padding-right">Total</label>
                                                <div class="col-sm-6 col-lg-5">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">Rs.</span>
                                                        <input class="form-control" placeholder="" name="total_exp" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Security Details</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseEight" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Security Type</label>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="security_type" type="text" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Description</label>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="" name="description" type="text" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Market value</label>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6 col-lg-5 form-group input-group">
                                                <span class="input-group-addon">Rs.</span>
                                                <input class="form-control" placeholder="" name="market_value" type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="radio">
                                        <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Offered to any other Loans</label>
                                            <label class="radio-inline ">
                                                <input value="Yes" name="any_other_loans" class="ace" type="radio">
                                                &nbsp &nbsp &nbsp &nbsp
                                                <span class="lbl">  Yes</span>
                                            </label>
                                            <label class="radio-inline">
                                                &nbsp &nbsp
                                                <input value="No" name="any_other_loans" class="ace" type="radio">
                                                <span class="lbl">  No</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Guarantors Information</a>
                                </h4>
                            </div>
                            <div style="height: 0px;" aria-expanded="false" id="collapseNine" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            First Guarantors Information
                                        </div>
                                        <div class="col-sm-offset-1 panel-body">

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Name with Initails</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_one_name" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Full Name</label>
                                                <div class="col-sm-4 col-lg-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_one_fname" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Current Address</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="" name="guarantors_one_address" type="text" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Contact Number</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input class="form-control" placeholder="" name="guarantors_one_number" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">NIC, Passport or Driving License Number</label>
                                                <div class="col-sm-3 col-lg-2 form-group">
                                                    <input class="form-control" placeholder="" name="guarantors_one_nic" type="text" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Sector</label>
                                                <div class=" col-sm-3 form-group">
                                                    <select class="form-control" name="guarantors_one_sector">
                                                        <option value="Govt/Semi Govt">Govt/Semi Govt</option>
                                                        <option value="asd">asdasd</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Address</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="" name="guarantors_one_off_address" type="text" required ></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Contact Number</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input class="form-control" placeholder="" name="guarantors_one_off_number" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Industry</label>
                                                <div class=" col-sm-3 col-lg-2 form-group">
                                                    <select class="form-control" name="guarantors_one_industry">
                                                        <option value="Trading">Trading</option>
                                                        <option value="asd">asdasd</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Designation</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_one_designation" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Assets Owned</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_one_assets" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Second Gudarantors Information
                                        </div>
                                        <div class="col-sm-offset-1 panel-body">

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Name with Initails</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_two_name" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Full Name</label>
                                                <div class="col-sm-4 col-lg-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_two_fname" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Current Address</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="" name="guarantors_two_address" type="text" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Contact Number</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input class="form-control" placeholder="" name="guarantors_two_number" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">NIC, Passport or Driving License Number</label>
                                                <div class="col-sm-3 col-lg-2 form-group">
                                                    <input class="form-control" placeholder="" name="guarantors_two_nic" type="text" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Sector</label>
                                                <div class=" col-sm-3 form-group">
                                                    <select class="form-control" name="guarantors_two_sector">
                                                        <option value="Govt/Semi Govt">Govt/Semi Govt</option>
                                                        <option value="asd">asdasd</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Address</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="" name="guarantors_two_off_address" type="text" required ></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Office Contact Number</label>
                                                <div class="col-sm-3 col-lg-2">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input class="form-control" placeholder="" name="guarantors_two_off_number" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Industry</label>
                                                <div class=" col-sm-3 col-lg-2 form-group">
                                                    <select class="form-control" name="guarantors_two_industry">
                                                        <option value="Trading">Trading</option>
                                                        <option value="asd">asdasd</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Designation</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_two_designation" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="font-weight:200" class="col-sm-4 control-label no-padding-right">Assets Owned</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="" name="guarantors_two_assets" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <br/>
                    <div>
                        <input type="hidden" name="application_status" value="Submitted" >
                        <button type="submit" name="submit" value="submit" class="col-lg-offset-3 col-lg-3 col-sm-offset-3 col-sm-3 btn btn-outline btn-md btn-success">Register</button>
                        <button type="reset" class="col-lg-2 col-lg-offset-1 col-sm-2 col-sm-offset-1 btn btn-outline btn-md btn-warning">Reset</button>
                        </div>
                    </fieldset>
                    <br/><br/><br/>
                </form>
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
    <script> $('.datepicker').datepicker()
    </script>

    <script src="../dist/js/date.js"></script>

    <script>
        window.onload = function () {
            startTime();
        }
    </script>
</body>
</html>