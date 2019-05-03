<?php 
require("connection.php");
session_start();
include('includes/class.messages.php');
$msg = new Messages();
try
{
	
//$file = "./resources/uploads/excel/".$file_name;
    if(!empty($_FILES['image']['name']))
{





    // Loop through each file
    
      $tmpFilePath = $_FILES['image']['tmp_name'];
    
    
        $filename = $_FILES['image']['name'];
       
//$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["images"]["name"][$i]));

        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath,"../uploadFiles/master_inventory/" .$filename ))
        {
        	$fname=$filename;
 }
  else{
 	$fname="noimage.jpg";
 }

 }
 else{
 	$fname="noimage.jpg";
 }
$sql="Insert into en_master_inventory(mi_unique_name,mi_qty,mi_image)values(:name,:count,:fname)";
$statement=$con->prepare($sql);


$statement->bindParam(':name',$name);
$statement->bindParam(':count',$count);
$statement->bindParam(':fname',$fname);


$name=$_REQUEST['name'];
$count=$_REQUEST['count'];

        
           
 



$statement->execute();

if($statement->rowCount())
{
 $msg->add('s','Master Inventory added succeccfully');
header("location:addinventory.php");
}
else
{
$msg->add('e','Something went wrong');
header("location:addinventory.php");	
}

}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>