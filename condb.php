<?php
$hostname = 'mysql.hostinger.in.th';
$username = 'u597636056_book';
$password = 'asdasdasd';
$database = 'u597636056_face';

// $connectHost = mysqli_connect($hostname,$username,$password) or die(mysqli_error());


// $connectDatabase = mysqli_select_db($database) or die(mysqli_error());

$con = mysqli_connect($hostname,$username,$password,$database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"u597636056_face");

mysqli_set_charset($con,"utf-8");

//mysqli_close($con);

// mysqli_query("SET NAMES utf8");
// mysqli_query("SET character_set_results=utf8");//ตั้งค่าการดึงข้อมูลออกมาให้เป็น utf8
// mysqli_query("SET character_set_client=utf8");//ตั้งค่าการส่งข้อมุลลงฐานข้อมูลออกมาให้เป็น utf8
// mysqli_query("SET character_set_connection=utf8");//ตั้งค่าการติดต่อฐานข้อมูลให้เป็น utf8

// $con = new mysqli($hostname,$username,$password,$database);

// if($con -> connect_error){
// 	die("Fail");
// }
// mysqli_set_charset($con,"uft-8");


//DDi4a1aJVUFT
 ?>
