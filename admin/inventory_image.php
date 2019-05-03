<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b>Add Image for Master Inventory</b></h1>
			</div>
		</div><!--/.row-->
		
<!--
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>





-->




	

			
			<div class="container-fluid">
	
	 <?php 	 $msg->display(); ?>
	
	<form class="form-horizontal" id="formid" action="inventoryimage_action.php" method="post" enctype="multipart/form-data">

		
			<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Inventory:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
 
     
      <select class="form-control" id="inventory" name="inventory" data-validation="required" data-validation-error-msg-required="Please select an inventory">
        <option value="">--select--</option>
		<?php

          $sql="select * from en_master_inventory where mi_image='noimage.jpg'";
          $statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($inventory=$statement->fetch())

{
          
          ?>
        <option value="<?php echo $inventory['mi_id']?>"><?php echo $inventory['mi_unique_name']?></option>
        <?php
          }
             } ?>
      </select>
</div>

</div>
</div>
</div>

<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Upload Image:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-6">
 
     
      <input type="file" name="image" id="image"  multiple="multiple" data-validation="required mime size" 
		 data-validation-allowing="jpg, png, jpeg">
</div>

</div>

</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-sm-offset-6 col-sm-6">
<input type="submit" class="btn btn-success btn-lg" value="Add">

</form>
	</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script> 
$(document).ready(function(){

	  //  $("a[href='#master']").attr("aria-expanded", "true").addClass("");
 $("#master").attr("aria-expanded", "true").addClass("children collapse in");
 $("#addimage").attr("class","active");
 $("#home").attr("class","");
	  });
</script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );

</script>

			
            <?php
            include('includes/footer.php');
            ?>

            <script>
            	
// $().ready(function(){

// $.validator.addMethod("valueNotEquals", function(value, element, arg){
//   return arg !== value;
//  }, "Value must not equal arg.");

//                     $("#formid").validate({

//                     	rules: {
                            
//                              inventory   : {
//                              	valueNotEquals: 'default'
//                              },
//                              image     : {

//                              	required : true,
//                              	extension: "jpg|png|jpeg|gif"
//                              }	
                             	
                             
                    		
//                     	},

//                     	messages : {
                    		
//                     		inventory: {
//                     			valueNotEquals: "Please select inventory"
                    			
//                     		},
//                     		image    : {
//                                 required: "Please upload image",
//                              	extension: "Please select jpg,png,jpeg files"
//                              }
//                     	}
//                     });

//             		});
            </script>