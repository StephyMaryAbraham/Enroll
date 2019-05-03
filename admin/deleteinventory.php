<?php 
require("connection.php");
session_start();
include('includes/class.messages.php');
$msg = new Messages();
try
{

$sql="delete from en_master_inventory where mi_id=:id";
$statement=$con->prepare($sql);

$statement->bindParam(':id',$id);


$id=$_REQUEST['id'];


$statement->execute();

if($statement->rowCount())
{
 $msg->add('s','Inventory deleted successfully');
header("location:viewinventory.php");
}
else
{
 
header("location:viewinventory.php");	
}

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>