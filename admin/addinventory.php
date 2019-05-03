<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b>Add Master Inventory</b></h1>
			</div>
		</div>


			
			<div class="container-fluid">
	
	 <?php 	 $msg->display(); ?>
	
	<form class="form-horizontal" id="formid" action="addinventory_action.php" method="post" enctype="multipart/form-data">

		
			<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Unique Id:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
	<?php 
          $sql="select * from en_master_inventory order by mi_id desc limit 1";
          $statement=$con->prepare($sql);
          $statement->execute();
          $showroom=$statement->fetch();
          $id=$showroom['mi_id']+1;
	 ?>
  <input type="text" placeholder="" class="form-control" id="id" name="id" value="<?php echo $id; ?>" disabled>
</div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Unique Name
:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="name" name="name" data-validation="required" data-validation-error-msg-required=" Product Unique Name is required">
</div>
   
 
</div>

</div>
</div>
<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Quantity
:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="count" name="count" ><span class="error_form" id="count_error_message"></span>
</div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Image:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-10">
    
  <input type="file" placeholder=""  id="image" name="image" value="" data-validation="mime size" 
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

	</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script> 
$(document).ready(function(){

	 
 $("#master").attr("aria-expanded", "true").addClass("children collapse in");
 $("#addinven").attr("class","active");
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

  
  $('#presentation').restrictLength( $('#pres-max-length') );

</script>

			
            <?php
            include('includes/footer.php');
            ?>

            <script>
            	

            </script>