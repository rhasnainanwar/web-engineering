<?
	include_once('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 1 - Employees</title>
	<style type="text/css">
	table {
		border: 1px solid;
		text-align: center;
	}
	th {
		background-color: lightgrey;
	}
	th, td {
		padding: 5px 10px;
	}
	</style>
</head>
<body>
	<br>
	<a href="add.php"><button>Add Employee</button></a>
	<br><br>
<table>
	<thead>
		<th>Name</th>
		<th>Email</th>
		<th>Job Title</th>
		<th>Office Address</th>
		<th>Reports To</th>
		<th>Update</th>
	</thead>
	<tbody>

	<?
		$query = "SELECT employees.employeeNumber as id, CONCAT(employees.firstName, ' ', employees.lastName) AS name, employees.email AS email, employees.jobTitle AS jobtitle, CONCAT(offices.addressLine1, ' ',offices.addressLine2, ' ', offices.city, ' ', offices.state, ' ', offices.country) as address, CONCAT(emp.firstname, ' ', emp.lastname, ', ', emp.jobTitle) AS reports from employees inner join offices on employees.officeCode = offices.officeCode left outer join employees as emp on emp.employeeNumber = employees.reportsTo;";
		$res = mysqli_query($mysql, $query);
		if (!$res) {
		    printf("Error: %s\n", mysqli_error($mysql));
		    exit();
		}
		while($row = mysqli_fetch_array($res)){
			echo "<tr>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["email"]."</td>";
			echo "<td>".$row["jobtitle"]."</td>";
			echo "<td>".(($row["address"] == '') ? '-----' : $row["address"])."</td>";
			echo "<td>".(($row["reports"] == '') ? '-----' : $row["reports"])."</td>";
			echo "<td><a href=\"edit.php?id=".$row["id"]."\">Edit</a> | <a href=\"delete.php?id=".$row["id"]."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			echo "</tr>";
		}
	?>

	</tbody>
</table>
<?
$mysql->close();
?>
</body>
</html>