<?php 
session_start();
include('includes/class.messages.php');
include('excel/PHPExcel.php');
include('connection.php');
$msg = new Messages();

try
{

//$file = "./resources/uploads/excel/".$file_name;
    if(!empty($_FILES['images']['name'][0]))
{



$total = count($_FILES['images']['name']);
$fname = array();
    // Loop through each file

    for($i=0; $i <= $total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['images']['tmp_name'][$i];
    
    
        $filename = $_FILES['images']['name'][$i];
         if ($tmpFilePath != ""){
       if(move_uploaded_file($tmpFilePath,"../uploadFiles/master_inventory/" .$filename )){
       
    }
           
 }
}
 
}



$file=$_FILES['userfile']['tmp_name'];



$objPHPExcel = PHPExcel_IOFactory::load($file);

$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();



foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 
    //The header will/should be in row 1 only. of course, this can be modified to suit your need.
    if ($row == 1) {
        $header[$row][$column] = $data_value;
    } else {
        $arr_data[$row][$column] = $data_value;
    }
}
// echo "<pre>";
// print_r ($arr_data);
// echo "</pre>";
foreach($arr_data as $import)
        {
        /*    $sq="select * from en_master_inventory where mi_unique_id=:A" ;
$ss=$con->prepare($sq);
$ss->bindParam(':A',$a);
$a=$import['A'];
$ss->execute();

if($ss->rowCount()!=0)
{
 $_SESSION['status']="id";
$msg->add('e', 'Duplicate entry. '.$import['A'].' is not added.');
 
header("location:excel_inventory.php");
}
else
{
    */
  
$sql="select * from en_master_inventory where mi_unique_name=:B" ;
$sss=$con->prepare($sql);
$sss->bindParam(':B',$b);
$b=$import['A'];
$sss->execute();

if($sss->rowCount()!=0)
{
    $_SESSION['status']="name";
$msg->add('e', 'Duplicate entry. '.$import['A'].' is not added.');
header("location:excel_inventory.php");
}
else
{
$query='insert into en_master_inventory(mi_unique_name,mi_qty,mi_image)values (:B,:C,:D)';
 $statement=$con->prepare($query);

//$data=array('mi_unique_id'=>$import['A'] ,'mi_unique_name'=>$import['B'] ,'mi_qty'=>$import['C'] , 'mi_image'=>$import['D']);

           //  insert
        	
//mi_unique_id

$statement->bindParam(':B',$b);
$statement->bindParam(':C',$c);
$statement->bindParam(':D',$d);

          
            $b=$import['A'];
        	// $qty=$import['B'];
            if(isset($import['B'])){
              
                $c=$import['B'];
            }
            else
            {
                  $c=0;
                
            }

        	//$imgs=$import['C'];
            if(isset($import['C'])){
               $d=$import['C']; 
            }else{
                $d="noimage.jpg";
            }
        	


$statement->execute();


}
/*}
*/

}

if($statement->rowCount()!=0)
{
$msg->add('s','Inventory added successfully');

header("Location:excel_inventory.php");

}
else
{
  $msg->add('e','Failed to add');

header("Location:excel_inventory.php");  
}





}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$con = null;




 ?>