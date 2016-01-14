 <?php session_start();
require_once 'database.php';
if (isset($_POST['username'])) {

	$sql = "SELECT * from Login_users
		  WHERE username='".$_POST['username']."'
		  AND password='".md5($_POST['password'])."'";

	$result = mysqli_query($conn, $sql);

	$row   = mysqli_fetch_row($result);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		$_SESSION['id'] = $row[3];
		header("location:registersm.php");
	} else {
		echo '<div class="alert alert-danger">
				<i class="ace-icon fa fa-close red"></i>
					<strong class="red">
						 &nbsp; The Username or Password you entered is incorrect.
					</strong>
			</div>';
	}
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

    <title>Login Page</title>

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
                <div class="login-panel panel panel-red">
                    <div class="panel-heading">
                        <h1 align="center" class="panel-title"> Login as Administrator to continue</h1>
                   </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline btn-md btn-success btn-block"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp  Login &nbsp &nbsp  &nbsp  &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
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
