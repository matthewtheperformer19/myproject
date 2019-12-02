<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM endgame.properties");
?>

<html>
<head>	
	<title>List of Properties</title>
</head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script language="javascript" type="text/javascript">
alert("List of Properties!")
</script>
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
	margin-left: 40px;
}
td{
	background-color: white;
	opacity: .5;
}
</style>
<body>
	<div class="bg">
<a class="btn draw-border" href="index.php">Home</a> | <a class="btn draw-border" href="addproperties.php">ADD properties</a> 
<center><h1 style="color:red;margin-left: 10px;">List of properties</h1></center>

	<table width='80%' border=0>

	<tr bgcolor='black'>
		<td>Vehicles</td>
		<td>Money</td>
		<td>Guns</td>
        <td>Songs</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['vehicles']."</td>";
		echo "<td>".$row['money']."</td>";
        echo "<td>".$row['guns']."</td>";
        echo "<td>".$row['songs']."</td>";	
		echo "<td><a href=\"pdelete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></br>";	
	}
	?>
	</table>
	</div>
</body>