 <!DOCTYPE html>  
<html>   
 <head>   
  <title>Task-1</title>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  </head>  
  <body>  

  <?php
	$month_temp = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73, 68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73];  
	echo "Average: ".array_sum($month_temp) / count($month_temp)."<br>";

	sort($month_temp);
	echo "List of seven highest: ".implode(", ", array_slice($month_temp, 0, 7));
	echo "<br>";
	echo "List of seven lowest: ".implode(", ", array_slice($month_temp, -7, 7));
    ?>  
  </body>
  
</html>