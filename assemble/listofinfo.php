<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM endgame.info");
?>

<html>
<head>	
	<title>List of info</title>
</head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script language="javascript" type="text/javascript">
alert("List of Users!")
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
	margin-left: 10px;
}
td{
	background-color: white;
	opacity: .5;
}
</style>
<body>
	<div class="bg">
<a class="btn draw-border" href="index.php">Home</a> | <a class="btn draw-border" href="addinfo.php">ADD info</a> 
<center><h1 style="color:red;margin-left: 10px;">List of Info</h1></center>

	<table width='80%' border=0>

	<tr bgcolor='black'>
		<td>Name</td>
		<td>Age</td>
		<td>Gender</td>
        <td>Address</td>
        <td>Occupation</td>

	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['age']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['occupation']."</td>";	
		echo "<td><a href=\"einfo.php?id=$row[ID]\">Edit</a> | <a href=\"pdelete.php?id=$row[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></br>";	
	}
	?>
	</table>
	</div>
</body>