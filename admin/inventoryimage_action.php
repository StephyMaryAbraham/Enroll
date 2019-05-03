<?php 
session_start();
include('includes/class.messages.php');
//include('includes/fms.php');
include('excel/PHPExcel.php');
include('connection.php');
$msg = new Messages();

try
{

//$file = "./resources/uploads/excel/".$file_name;
    if(!empty($_FILES['image']['name']))
{


$inventory=$_POST['inventory'];


    // Loop through each file
    
      $tmpFilePath = $_FILES['image']['tmp_name'];
    
    
        $filename = $_FILES['image']['name'];
       
//$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["images"]["name"][$i]));

        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath,"../uploadFiles/master_inventory/" .$filename ))
        {

$query="update en_master_inventory set mi_image=:filename where mi_id=:inventory";
 $statement=$con->prepare($query);

//$data=array('mi_unique_id'=>$import['A'] ,'mi_unique_name'=>$import['B'] ,'mi_qty'=>$import['C'] , 'mi_image'=>$import['D']);

           //  insert
            
//mi_unique_id
$statement->bindParam(':inventory',$inventory);
$statement->bindParam(':filename',$filename);

$inventory=$_POST['inventory'];

        }
        
           
 
}


$statement->execute();




if($statement->rowCount()!=0)
{
$msg->add('s','Inventory image added successfully');

header("Location:inventory_image.php");

}
else
{
  $msg->add('e','Something went wrong');

header("Location:inventory_image.php");  
}





}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;




 ?>