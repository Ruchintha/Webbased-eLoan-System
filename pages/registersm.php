<?php session_start();
require_once 'database.php';
if (!isset($_SESSION['id'])) {
	header("location:loginadmin.php");
}
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
                    <i class="fa fa-check green"></i>
                    &nbsp; New user created successfully
                    </div>';
		} else {
			echo '<div class="alert alert-block alert-warning">
                    <i class="fa fa-remove red"></i>
                    &nbsp; Failed to crated new user
                    </div>'.mysqli_close($conn);
		}

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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Registration </title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 align="center"> <span style="font-size:140%; color:#337AB7"><i>e</i></span>Loan
                </h1>
                <h4 align="center">
                    loan Management System
                </h4>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 align="center" class="panel-title"> Enter Registration details</h1>
                   </div>
                    <div class="panel-body">
                        <form name="f1" method="POST" action="registersm.php">
                            <fieldset>
                            <br/>
                                <div class="form-group">
                                	<input type="text" name="name" class="form-control" placeholder="First Name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>
                                </br>
                                <div>
                                    <div class="btn-group btn-corner col-lg-offset-1">
                                        <button type="submit" class="btn btn-outline btn-md btn-success"> &nbsp &nbsp Register &nbsp &nbsp </button>
                                        <button type="reset" class="btn btn-outline btn-md btn-warning"> &nbsp Reset &nbsp</button>
                                        <a type="button" class="btn btn-outline btn-md btn-info" href="index.php">Home &nbsp</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
