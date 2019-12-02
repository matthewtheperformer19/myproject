<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM endgame.properties ");
?>

<html>
<head>	
	<title>Properties</title>
</head>
<style type="text/css">
	<style type="text/css">
	body{
		padding: 0;
		margin:0;
	}
 .bg {
  background-image: url("logo.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
 .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}
.draw-border:hover {
  color: white;
}
.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 1em 2em;
  letter-spacing: 0.05rem;
  margin: 10px;
}
table{
	margin-left: 10px;
}
td{
	background-color: white;
	opacity: .5;
}
</style>
<body>
	<div class="bg">

		<div class="row">
			<div class="col-sm-12">
				<a class="btn draw-border" href="index.php">Home</a> | <a class="btn draw-border" href="addproperties.php">ADD Properties</a>
			</div>
		</div>

		<div class="row">
			<div align="center" class="col-sm-12">
				<h1 style="color: white">Properties</h1>
			</div>
		</div>


<br/><br/>
	
	

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Houses</td>
		<td>Vehicles</td>
		<td>Money</td>
		<td>Guns</td>
		<td>Delete</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['ID']."</td>";
		echo "<td>".$row['Houses']."</td>";
        echo "<td>".$row['Vehicles']."</td>";
        echo "<td>".$row['Money']."</td>";
		echo "<td>".$row['Guns']."</td>";	
		echo "<td><a href=\"pdelete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
	</div>
</body>