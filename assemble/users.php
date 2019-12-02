<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$inickname=$_POST['username'];
	$irole=$_POST['password'];
	
	// checking empty fields
	if(empty($username) || empty($password)) {	
			
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
			
	} else {	
		//updating the table
		$sql = "UPDATE endgame.tusers SET username=:username, password=:password WHERE id=:id";
		$query = $conn->prepare($sql);
				
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
$sql = "SELECT * FROM endgame.tusers  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$iusername = $row['username'];
	$ipassword = $row['password'];
}
?>
<html>
<head>	
	<title>Edit Users</title>
</head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
	body{
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
*{
	color: white;
}
</style>
<body>
	<a class="btn draw-border" href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="users.php">

		<div class="containter">
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<td class="float">Username</td>
				</div>
				<div class="col-sm-6">.
					<input type="text" name="username" value="<?php echo $iusername;?>">
				</div>
			</div>


			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<td class="float">Password</td>
				</div>
				<div class="col-sm-6">.
					<td><input type="text" name="password" value="<?php echo $ipassword;?>"></td>
				</div>
			</div>

			<br><br>

			<div class="row">
				<div align="center" class="col-sm-12">
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn draw-border" type="submit" name="update" value="Update"></td>
				</div>
			</div>

		</div>

	</form>
</body>
</html>