<?php
//including the database connection file
include("conn.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysql, "DELETE FROM employees WHERE employeeNumber = $id");
if (!$result) {
	echo mysqli_error($mysql);
}
$mysql->close();

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

