<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];	
	
	
	// checking empty fields
	if(empty($id) || empty($username) || empty($password)) {	
			
		if(empty($id)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$sql = "UPDATE users SET username=:username, password=:password WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':username', $username);
		$query->bindparam(':password', $password);
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
	$id = $row['id'];
	$username = $row['username'];
	$password = $row['password'];
	
	
	
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
				<td>id</td>
				<td><input type="text" name="id" value="<?php echo $id;?>"></td>
			</tr>
			<tr> 
				<td>username</td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>password</td>
				<td><input type="text" name="password" value="<?php echo $password;?>"></td>
			</tr>
		</table>
	</form>
</body>
</html>
