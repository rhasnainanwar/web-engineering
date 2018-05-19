<?php
// including the database connection file
include_once("conn.php");

if(isset($_POST['add'])){	
	$enum = mysqli_real_escape_string($mysql, $_POST['enum']);
	$fname = mysqli_real_escape_string($mysql, $_POST['fname']);
	$lname = mysqli_real_escape_string($mysql, $_POST['lname']);
	$ext = mysqli_real_escape_string($mysql, $_POST['ext']);
	$email = mysqli_real_escape_string($mysql, $_POST['email']);
	$offcode = mysqli_real_escape_string($mysql, $_POST['offcode']);
	$reports = mysqli_real_escape_string($mysql, $_POST['reports']);
	$job = mysqli_real_escape_string($mysql, $_POST['job']);
	if (empty($reports)) {
		$reports = 'NULL';
	}
	// checking empty fields
	if(empty($fname) || empty($lname) || empty($email) || empty($ext) || empty($offcode) || empty($job)) {
		echo "<font color='red'>Some fields are empty.</font><br/>";
	} else {	
		//updating the table
		$result = mysqli_query($mysql, "INSERT INTO employees VALUES ($enum, '$lname', '$fname', '$ext', '$email', '$offcode', $reports, '$job');");
		if ($result) {
			echo "<font color='green'>Employee added successfully!</font> Check <a href=\"index.php\">here</a>.<br/>";
		}
		else
			echo "<font color='red'>Operation failed! Try again.</font><br/>";
		$mysql->close();
	}
}
?>

<html>
<head>	
	<title>Add Employee</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="add.php">
		<table border="0">
			<tr>
				<td>Employee Number</td>
				<td><input type="text" name="enum" value=""></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="fname" value=""></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value=""></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value=""></td>
			</tr>
			<tr> 
				<td>Extension</td>
				<td><input type="text" name="ext" value=""></td>
			</tr>
			<tr> 
				<td>Office Code</td>
				<td><input type="text" name="offcode" value=""></td>
			</tr>
			<tr> 
				<td>Reports To</td>
				<td><input type="text" name="reports" value=""></td>
			</tr>
			<tr> 
				<td>Job Title</td>
				<td><input type="text" name="job" value=""></td>
			</tr>
			<tr>
				<td><input type="submit" name="add" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
