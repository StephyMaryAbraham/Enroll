<?php 
require("connection.php");
session_start();
include('includes/class.messages.php');
$msg = new Messages();
try
{

$sql="delete from en_product where product_id=:id";
$statement=$con->prepare($sql);

$statement->bindParam(':id',$id);


$id=$_REQUEST['id'];


$statement->execute();

if($statement->rowCount())
{
 $msg->add('s','Product deleted successfully');
header("location:viewproduct.php");
}
else
{
 
header("location:viewproduct.php");	
}

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>