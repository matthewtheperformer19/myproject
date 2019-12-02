<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$occupation=$_POST['occupation'];	
	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($gender) || empty($address) || empty($occupation)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($address)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($occupation)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$sql = "UPDATE users SET name=:name, age=:age,  gender=:gender  address=:address,  occupation=:occupation WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':gender', $gender);
		$query->bindparam(':address', $address);
		$query->bindparam(':occupation', $occupation);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM endgame.tusers WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$age = $row['age'];
	$gender = $row['gender'];
	$address = $row['address'];
	$occupation = $row['occupation'];
	
	
	
}
?>
<html>
<head>	
	<title>Edit Users</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="users" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
			<tr> 
				<td>address</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
			<tr> 
				<td>occupation</td>
				<td><input type="text" name="occupation" value="<?php echo $occupation;?>"></td>
			</tr>
		</table>
	</form>
</body>
</html>
