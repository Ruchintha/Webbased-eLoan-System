<html>
<body>
<?php
include 'datebase.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if (isset($_POST['submit'])) {
		$name   = $_POST['name'];
		$status = $_POST['status'];
		$query3 = mysql_query("update Client_Registration set name='$name', status='$status' where id='$id'");
		if ($query3) {
			header('location:view.php');
		}
	}
	$result = mysql_query("select * from Client_Registration where id='$id'");
	$row    = mysql_fetch_array($result);
	?>
										<form method="post" action="">
										Name:<input type="text" name="name" value="<?php echo $row['4']?>" /><br />
										Status:<input type="text" name="age" value="<?php echo $row['2']?>" /><br /><br />
										<br />
										<input type="submit" name="submit" value="update" />
										</form>
	<?php
}
?>
</body>
</html>