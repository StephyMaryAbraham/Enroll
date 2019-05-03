<?php 
require("connection.php");
session_start();
include('includes/class.messages.php');
include('excel/PHPExcel.php');
$msg = new Messages();
try
{

	
      //Get the temp file path
      //$tmpFilePath = $_FILES['image']['tmp_name'];
      
       
      //Make sure we have a filepath
     // if ($tmpFilePath != ""){
        //Setup our new file path
        // $filename = date('dmYHis').str_replace(" ", "", basename($_FILES['image']['name']));
        // $newFilePath = "../uploadFiles/product/" . $_FILES['image']['name'];

//}
        //Upload the file into the temp dir
        // if(move_uploaded_file($tmpFilePath, $newFilePath)) {
  if($_REQUEST['my-select']=="")
  {
    $msg->add('e','No Products to add. Please select products');
    header("location:addproduct.php");
  }
  else
  {
for ($i = 0; $i < count($_REQUEST['my-select']); $i++) {
  

       $sql="insert into en_product(showroom_id,product_mi_id)values(:showroomid,:product)";
  $statement=$con->prepare($sql);


$statement->bindParam(':showroomid',$showroomid);
$statement->bindParam(':product',$name);
// $statement->bindParam(':count',$count);
// $statement->bindParam(':filename',$filename);


$showroomid=$_REQUEST['showroomid'];
$name=$_REQUEST['my-select'][$i];
//$count=$_REQUEST['count'];
//$filename = $_FILES['image']['name'];

        
        
   
$statement->execute();
}


if($statement->rowCount())
{
 
 $msg->add('s','Products added successfully');
header("location:addproduct.php");
}
else
{
  $msg->add('e','Failed to add');

header("location:addproduct.php");	
}
}

}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>