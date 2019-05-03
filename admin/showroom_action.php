<?php 
require("connection.php");
session_start();
try
{

$sql="Insert into en_showroom(showroom_name,showroom_address,showroom_location,showroom_image)values(:name,:address,:location,'default.png')";
$statement=$con->prepare($sql);

$statement->bindParam(':name',$name);
$statement->bindParam(':address',$address);
$statement->bindParam(':location',$location);

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$location=$_REQUEST['location'];

$statement->execute();

if($statement->rowCount())
{
 $_SESSION["session_status"] = 'success';
header("location:addshowroom.php");
}
else
{
 $_SESSION["session_status"] = 'failed';
header("location:addshowroom.php");	
}

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>