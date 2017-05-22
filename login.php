<?php
	session_start();
  require 'condb.php';

  $name = $_POST['name'];
  $sql = "SELECT * FROM user where user_name ='$name'";
  $query = mysqli_query($con,$sql);
  if(mysqli_num_rows($query)>0){
  	$_SESSION['name'] = $name;
  	echo "<script type='text/javascript'>alert('เข้าสู่ระบบ')</script>";
  }else{
  	echo "<script type='text/javascript'>alert('ไม่มีชื่อในระบบ')</script>";
  }
header("Refresh:0; index.php");
?>