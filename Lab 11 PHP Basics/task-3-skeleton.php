<!DOCTYPE html>  
<html>   
 <head>   
  <title>Task-3</title>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <style type="text/css">
  	td {
  		/* As sizing is not tested here, I'm choosing the size that seems fit.  */
  		width: 60px;
  		height: 60px;
  	}
  	table {
  		border: 1px solid;
  	}
  </style>
  </head>
  <body>   
  <h3>Chess Board - PHP Nested Loops</h3>
  <?php
  	$size  = 8;
  	$bgs = ['black', 'white'];
  	echo "<table>";
  	for ($i=0; $i < $size; $i++) {
  		echo "<tr>";
  		for ($j=0; $j < $size; $j++) { 
  			echo "<td bgcolor='".$bgs[ ($i + $j) % 2 ]."'></td>";
  		}
  		echo "</tr>";
  	}
  	echo "</table>";
  ?>
  </table>  
  </body>  
  </html> 