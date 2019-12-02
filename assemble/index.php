<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>LOGIN</title>
<style type="text/css">
    body{
        padding: 0;
        margin: 0;
    }
    .bg{
        background-image: url("arc.jpg");
        height: 939px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
 
}
.glow {
  text-align: center;
}
.glow .major {
  color: red;
  text-shadow: 0 0 2px gold, 0 0 10px gold, 0 0 20px gold, 0 0 30px gold, 0 0 40px gold, 0 0 50px gold;
}
.glow .major {
  display: block;
  font-size: 100px;
}
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
button {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
}
</style>
</head>
<body>
    <div class="bg">
    <div class="glow">
    <h1 class="major" class="btn draw-border">Welcome to your life</h1>
    <a href="logout.php" class="btn draw-border">LOG-OUT</a>
    <a href="listofusers.php" class="btn draw-border">Edit User</a>
    <a href="listofproperties.php" class="btn draw-border">PROPERTIES</a>
    <a href="listofinfo.php" class="btn draw-border">PERSNAL INFO</a>
    <br>
    </div> 
</style>
</head>
<body>
	
    
<?php
session_start();
$br = "<br/>";
include_once ('config.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
// header ("location:login.php");
?>