<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];

    $sql = "insert into endgame.info";
    $sql .= "(name, age, gender, address, occupation) ";
    $sql .= "values (:jname, :jage, :jgender, :jaddress, :joccupation)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':jname', $name);
    $query -> bindParam(':jage', $age);
    $query -> bindParam(':jgender', $gender);
    $query -> bindParam(':jaddress', $address);
    $query -> bindParam(':joccuaption', $occupation);
    $query -> execute();
    echo "Successfully Added";
    header("Location:listofinfo.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Info</title>

<script language="javascript" type="text/javascript">
alert("You are now adding a Info!")
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
            width: 65%;
            height: 50px;
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
                <label>Name</label>
            </div>
            <div class="col-sm-2">
                <textarea name="name"cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Age</label>
            </div>
            <div class="col-sm-2">
                <textarea name="age"cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-1">
                <label>Gender</label>
            </div>
             <div class="col-sm-2">
                <textarea name="gender"cols="30" rows="10"></textarea>
            </div>
        </div> <br>

        <div class="row">
            <div class="col-sm-2">
                <label>Address</label>
            </div>
            <div class="col-sm-1">
                <input type="text" name="address">
            </div>
        </div> <br>

         <div class="row">
            <div class="col-sm-2">
                <label>Occupation</label>
            </div>
            <div class="col-sm-1">
                <input type="text" name="occupation">
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