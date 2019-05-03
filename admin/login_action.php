<?php
session_start();
include('includes/class.messages.php');
require('connection.php'); 
$msg = new Messages();

$email=$_POST['email'];
$password=$_POST['password'];

$sql="select * from admin where email='$email' and password='$password'";

$result=$con->query($sql);
$count=$result->rowCount();

if($count>0)
{
$_SESSION["user_id"]=$email;
//$_SESSION["session_status"]='success';
$msg->add('s', 'Login successfull');
header("location:index.php");

}
else {
//$_SESSION["session_status"]='failed';
$msg->add('e', 'Login failed');
 header("location:login.php");
}

 ?>