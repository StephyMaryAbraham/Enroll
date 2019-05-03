<?php 
require("connection.php");
try{
$id=$_POST['showroom_id'];
 


  

       $sql="select * from en_master_inventory where mi_id not in (select product_mi_id from en_product where showroom_id=:showroomid)";
  $statement=$con->prepare($sql);


$statement->bindParam(':showroomid',$showroomid);

$showroomid=$_POST['showroom_id'];
   
$statement->execute();

if($statement->rowCount())
{
	
	while($product=$statement->fetch())

{
 
  echo "<option value='".$product['mi_id']."'>".$product['mi_unique_name']."</option>"; 
}

}
else
{
  echo "<option value=''>All products are added</option>"; 
}


}


catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;
 ?>

 