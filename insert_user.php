<?php
error_reporting(0);
	session_start();
  require 'condb.php';

  $idface = 0;
  if(isset($_GET['idface'])){
  	$idface = $_GET['idface'];
  }if(isset($_GET['name'])){
  	$name = $_GET['name'];
  }if (isset($_POST['name'])) {
  	$name = $_POST['name'];
  }
  $name_re = str_replace("'","''",$name);
  $sql = "SELECT * FROM user where user_name ='$name_re' or user_id_wface = '$idface'";
  $query = mysqli_query($con,$sql);
  if(isset($_GET['name'])){
  	if(mysqli_num_rows($query)<1){
	  	$sqlin = "INSERT INTO user(user_id_wface,user_name) VALUES('$idface','$name_re')";
	  	mysqli_query($con,$sqlin);
	  	$_SESSION['name'] = $name;
	   }else{
      $_SESSION['name'] = $name;
     }
  }else if(isset($_POST['name'])){
  		if(mysqli_num_rows($query)<1){
		  	$sqlin = "INSERT INTO user(user_id_wface,user_name) VALUES('$idface','$name')";
		  	mysqli_query($con,$sqlin);
		  	$name = str_replace("/'/","'",$name);
		  	$_SESSION['name'] = $name;
		  	echo "<script type='text/javascript'>alert('สมัครเรียบร้อย')</script>";
		  }
		  else{
		  	echo "<script type='text/javascript'>alert('มีในระบบแล้ว')</script>";
		  }
  }

header("Refresh:0; index.php");
?>