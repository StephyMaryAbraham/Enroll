<?php 
require("connection.php");
session_start();
try
{

	if($_FILES['image']['name']!="")
	{
      //Get the temp file path
      $tmpFilePath = $_FILES['image']['tmp_name'];
      
       
      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $filename = date('dmYHis').str_replace(" ", "", basename($_FILES['image']['name']));
        $newFilePath = "./uploadFiles/product/" . $_FILES['image']['name'];

}
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {

       $sql="update en_product set showroom_id=:showroomid,product_name=:product,product_count=:count,product_image=:filename where product_id=:id";

        $statement=$con->prepare($sql);

$statement->bindParam(':id',$id);
$statement->bindParam(':showroomid',$showroomid);
$statement->bindParam(':product',$name);
$statement->bindParam(':count',$count);
$statement->bindParam(':filename',$filename);


$id=$_REQUEST['id'];
$showroomid=$_REQUEST['showroomid'];
$name=$_REQUEST['product'];
$count=$_REQUEST['count'];
$filename = $_FILES['image']['name'];
   }
$statement->execute();

}
   else
   {
   	$sql="update en_product set showroom_id=:showroomid,product_name=:product,product_count=:count where product_id=:id";
   
  $statement=$con->prepare($sql);


$statement->bindParam(':id',$id);
$statement->bindParam(':showroomid',$showroomid);
$statement->bindParam(':product',$name);
$statement->bindParam(':count',$count);


$id=$_REQUEST['id'];
$showroomid=$_REQUEST['showroomid'];
$name=$_REQUEST['product'];
$count=$_REQUEST['count'];

$statement->execute();
    }    
        
   



if($statement->rowCount())
{
 $_SESSION["update_session_status"] = 'success';
header("location:viewproduct.php?id=".$id);
}
else
{
 $_SESSION["update_session_status"] = 'failed';
header("location:viewproduct.php");	
}

}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>