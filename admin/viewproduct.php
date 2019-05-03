<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');

?>
  
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    
    <div class="row">
      <div class="col-lg-12">

        <h1 class="page-header"><b>View Products in Store</b></h1>
      </div>
    </div>

   
 <?php $msg->display(); ?>
                    

                  
                
    <table class="table table-bordered table-hover">

        <!--   <tr>
                          
                          
                            
                            <th colspan="7" style="background-color:#6495ED;text-align:center;">PRODUCTS</th>
                           
                        </tr> -->
                    <thead>
                        
  <tr>
  <th style="background-color:#6495ED;text-align:center;">SL No</th>
  <th style="background-color:#6495ED;text-align:center;">Showroom Name</th>
  <th style="background-color:#6495ED;text-align:center;">Product Name</th>
  <th style="background-color:#6495ED;text-align:center;">Product Count</th>
  <th style="background-color:#6495ED;text-align:center;">Product Image</th>
  <th style="background-color:#6495ED;text-align:center;">Actions</th>
  
  
  </tr>
        </thead>
        <tbody>
           
           <?php

if(isset($_POST['showroomid']))
{
  $id=$_POST['showroomid'];
  $sql="select * from en_product join en_showroom on en_product.showroom_id=en_showroom.showroom_id join en_master_inventory on en_product.product_mi_id=en_master_inventory.mi_id where en_product.showroom_id='$id'";
}

else
{

$sql="select * from en_product join en_showroom on en_product.showroom_id=en_showroom.showroom_id join en_master_inventory on en_product.product_mi_id=en_master_inventory.mi_id ORDER BY `en_product`.`product_id` DESC";
}
$statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($showroom=$statement->fetch())

{
                
static $x=1;
                  ?>
            <tr>
           <td style="text-align:center;"><?php echo $x; ?></td>
          
            <td style="text-align:center;"><?php echo $showroom['showroom_name'];?></td>
            <td style="text-align:center;"><?php echo $showroom['mi_unique_name'];?></td>
            <td style="text-align:center;"><?php echo $showroom['product_count'];?></td>
            <?php  if($showroom['product_image']!="") 
            {?>
            <td style="text-align:center;"><img src="../uploadFiles/product/<?php echo $showroom['product_image'];?>" height="150" width="150"></td>
            <?php }
            else {
             ?>
             <td style="text-align:center;">No image</td>
             <?php } ?>
            <!-- <td style="text-align:center;"><a class="btn btn-info" href="editproduct.php?id=<?php echo $showroom['product_id'];?>">Edit</a></td> -->
            <td style="text-align:center;"><a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $showroom['product_id'];?>" id="delete">Delete</a></td>
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

        
      <!-- <div class="pagination_links"> 
                
                         </div> -->
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




$(document).ready(function(){

    //  $("a[href='#master']").attr("aria-expanded", "true").addClass("");
 $("#product").attr("aria-expanded", "true").addClass("children collapse in");
 $("#viewpro").attr("class","active");
 $("#home").attr("class","");
 });
</script>
            <script>
              
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
            
            var showroom=$(this).val();
          //  alert('hai');
            $('#productid').attr("value",showroom);
        });

  });


$("#Sel1").select2({});
            </script>