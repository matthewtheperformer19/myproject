<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $bvehicle = $_POST['vehicle'];
    $bmoney = $_POST['money'];
    $bguns = $_POST['guns'];
    $bsongs = $_POST['songs'];

    $sql = "insert into endgame.properties";
    $sql .= "(vehicle, money, guns, songs ) ";
    $sql .= "values (:hvehicle, :hmoney, :hguns, :hsongs)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':hvehicle', $bvehicle);
    $query -> bindParam(':hmoney', $bmoney);
    $query -> bindParam(':hguns', $bguns);
    $query -> bindParam(':hsongs', $bsongs);
    $query -> execute();
    echo "Successfully Added";
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>

<script language="javascript" type="text/javascript">
alert("You are now adding a user!")
</script>

     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
            body{
            background-image: url("logo.jpg") ;
            background-repeat: "no-repeat";
        }
        h1{
            color: white;
            margin-top: 20px;
            text-shadow: 2px 2px 10px white;
        }
        .box1{
            position: absolute;
            width: 30%;
            height: 20px;
            background-color: blue;
            right: 0;
            margin-top: 22px;
            box-shadow: -5px 0px 18px white;
        }
        label{
            float: right;
            color: white;
        }
        .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
  margin:10px;
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
}


</style>
</head>
<body>
    <form action="addinfo.php" method="POST">
        <a class="btn draw-border" href="index.php">Home</a> 
        <div class="contain"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <label>Username</label>
            </div>
            <div class="col-sm-2">
                <textarea name="vehicles"cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Password</label>
            </div>
        </div> <br>

        <div class="row">
            <div class="col-sm-5">
                <label>Songs</label>
            </div>
            <div class="col-sm-7">
                <input type="text" name="songs">
            </div>
        </div> <br>

        <div class="row">
            <div align="center" class="col-sm-12">.
                <input type="submit" name="Register" value="Add">
            </div>
        </div>
        
    </form>
        
</body>
</html>