<?php
// including the database connection file
include_once("conn.php");

if(isset($_POST['update'])){	

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
		$query = "UPDATE employees SET firstName='$fname',lastName='$lname', email='$email', extension='$ext', officeCode='$offcode', reportsTo=$reports, jobTitle = '$job' WHERE employeeNumber = ".$_POST["id"].";";
		$result = mysqli_query($mysql, $query);
		if ($result) {
			echo "<font color='green'>Employee added successfully!</font> Check <a href=\"index.php\">here</a>.<br/>";
		}
		else {
			echo "<font color='red'>Operation failed! Try again.</font><br/>";
		}
	}
}
?>


<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysql, "SELECT * FROM employees WHERE employeeNumber = $id;");
$result = mysqli_fetch_array($result);
$mysql->close();
?>


<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php?id=<? echo $_GET['id']; ?>" >
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="fname" value="<?php echo $result["firstName"];?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $result["lastName"];?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $result["email"];?>"></td>
			</tr>
			<tr> 
				<td>Extension</td>
				<td><input type="text" name="ext" value="<?php echo $result["extension"];?>"></td>
			</tr>
			<tr> 
				<td>Office Code</td>
				<td><input type="text" name="offcode" value="<?php echo $result["officeCode"];?>"></td>
			</tr>
			<tr> 
				<td>Reports To</td>
				<td><input type="text" name="reports" value="<?php echo $result["reportsTo"];?>"></td>
			</tr>
			<tr> 
				<td>Job Title</td>
				<td><input type="text" name="job" value="<?php echo $result["jobTitle"];?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
