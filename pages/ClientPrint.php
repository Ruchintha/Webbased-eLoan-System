<?php
require_once 'database.php';
$id = $_GET['id'];

$sql    = "SELECT * FROM Client_Registration WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> &nbsp <span style="font-size:140%; color:#337AB7"><i>e</i></span>Loan
    <small>
    	&nbsp Loan Mangament System
    </small>
</h1>

<h3>Client Registration Information</h3>

		<table>

			<tr>
				<td>Name </td>
				<td> - <?php echo $row['3'];?></td>
			</tr>
			<tr>
				<td>Date Of Birth</td>
				<td> - <?php echo $row['8'];?></td>
			</tr><tr>
				<td>Gender</td>
				<td> - <?php echo $row['9'];?></td>
			</tr>
			<tr>
				<td>Marital Status</td>
				<td> - <?php echo $row['10'];?></td>
			</tr>
			<tr>
				<td>NIC Number</td>
				<td> - <?php echo $row['11'];?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td> - <?php echo $row['14'];?></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td> - <?php echo $row['16'];?></td>
			</tr>
			<tr>
				<td>E-Mail Address</td>
				<td> - <?php echo $row['18'];?></td>
			</tr>
		</table>
	<form>
	<br/>
		<input type="button" onClick="window.print()" value="Print This Page">
	</form>
</body>
</html>