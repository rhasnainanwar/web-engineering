<!DOCTYPE html>  
<html>  
    <head>   
	  <title>Task-2</title>  
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
	  <style type="text/css">
	  	table, td {border: 1px solid;}
	  </style>
	</head>  
	<body>   
    <?php  
		$rows = 6;
		$cols = 5;

		echo "<table cellpadding='10'>";
		for($row = 1; $row <= $rows; $row++){
			echo "<tr>";
			for($col = 1; $col <= $cols; $col++){
				echo "<td> $row * $col = ".$row * $col."</td>";
				
			}
			echo "</tr>";
		}
		echo "</table>";
    ?>  
  </body>  
</html>  
	