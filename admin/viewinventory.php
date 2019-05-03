<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');

?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<div class="row">
			<div class="col-lg-12">

				<h1 class="page-header"><b>View Master Inventory</b></h1>
			</div>
		</div>
 <?php    $msg->display(); ?>
    
 
                    

                  
                    
		<table class="table table-bordered table-hover">
                    <thead>
                       
	<tr>
  <th style="background-color:#6495ED;text-align:center;">SL No</th>
	<th style="background-color:#6495ED;text-align:center;">Id</th>
	<th style="background-color:#6495ED;text-align:center;">Product Name</th>
	<th style="background-color:#6495ED;text-align:center;">Product Count</th>
  <th style="background-color:#6495ED;text-align:center;">Product Image</th>
  <th style="background-color:#6495ED;text-align:center;">Actions</th>
  
	
	</tr>
        </thead>
        <tbody>
           
           <?php


$sql="select * from en_master_inventory order by `mi_id` DESC ";

$statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($inventory=$statement->fetch())

{

 
                
static $x=1;
                 	?>
            <tr>
           <td style="text-align:center;"><?php echo $x; ?></td>
          
            <td style="text-align:center;"><?php echo $inventory['mi_id'];?></td>
            <td style="text-align:center;"><?php echo $inventory['mi_unique_name'];?></td>
            <td style="text-align:center;"><?php echo $inventory['mi_qty'];?></td>
            <?php  if($inventory['mi_image']=='noimage.jpg') 
            {?>
             <td style="text-align:center;">No image</td>
             <?php }
            else {
             ?>
                         <td style="text-align:center;"><img src="../uploadFiles/master_inventory/<?php echo $inventory['mi_image'];?>" height="150" width="150"></td>

             <?php } ?>
            <td style="text-align:center;"><a class="btn btn-danger" href="deleteinventory.php?id=<?php echo $inventory['mi_id'];?>" id="delete">Delete</a></td>
    </tr>
            	<?php 
 $x++;
               }

             }
               ?>
            
        </tbody>
			
						
			
                        </table>
                         
        
                       

        <br>
        <br>
		
            <?php

            include('includes/footer.php');
            ?>

            <script> 

$(document).ready(function(){
    $('.table').DataTable({
 stateSave: true
}
      );
});
</script>

<script>
$(document).ready(function(){

    //  $("a[href='#master']").attr("aria-expanded", "true").addClass("");
 $("#master").attr("aria-expanded", "true").addClass("children collapse in");
 $("#viewinven").attr("class","active");
 $("#home").attr("class","");
    });
</script>

            <script>
              
$(document).ready(function(){
    $('.table').DataTable();
}); 
              
$(document).on("click","#delete", function(e) {
                  var link=$(this).attr("href");
      e.preventDefault();
      bootbox.confirm({
          title: "<center><b>Deleting Product</b></center>",
          message: "Do you want to delete this product ?",
          buttons: {
              confirm: {
                  label: 'Yes',
                  className: 'btn-success'
              },
              cancel: {
                  label: 'No',
                  className: 'btn-danger'
              }
          },
          callback: function(result) {
              if (result != false) {
                 window.location = link;
              }
          }
      });

  });
$(document).ready(function(){
        $('#Sel1').on('change',function(){
            
            var inventory=$(this).val();
          //  alert('hai');
            $('#productid').attr("value",inventory);
        });

  });

            </script>