<?php 

include_once ('config.php');

session_start();

if(!isset($_SESSION['user'])){

    header("location:login.php");

}

if(isset($_POST['Register'])){
    $id = $_POST['id'];
    $iusername = $_POST['username'];
	$ipassword = $_POST['password'];
	

    


    $sql = "insert into avengers.tusers";
    $sql .= "(id, username, password)";
    $sql .= "values (:pid, :pusername, :ppassword)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':pid', $eid);
    $query -> bindParam(':pusername', $eusername);
    $query -> bindParam(':ppassword', $epassword);
    $query -> execute();
    echo "Successfully Added";
    header("Location:login.php");

}

?>



