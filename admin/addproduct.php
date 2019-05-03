<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');



?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b>Add Products to Store</b></h1>
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
<?php    $msg->display(); ?>
	
	
	
	
	<form class="form-horizontal" id="productform" action="addproduct_action.php" method="post" enctype="multipart/form-data">	

		<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Showroom:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
 
     
      <select class="form-control" id="Sel1" name="showroomid" data-validation="required" data-validation-error-msg-required="Please select a showroom">
        <option value="">--select--</option>
		<?php
          $sql="select * from en_showroom";
          $statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($showroom=$statement->fetch())

{
          
          ?>
        <option value="<?php echo $showroom['showroom_id']?>"><?php echo $showroom['showroom_name']?></option>
        <?php
          }
             } ?>
      </select>
</div>

</div>
</div>
</div>

<input type="hidden">

		<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Products:</label>
    
    <div class="col-sm-10">
    <div class="row">
         <?php
          $sql="select * from en_master_inventory";
          $statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count==0)
{
    ?>
    <div class="row">
       <div class="col-sm-push-0 col-sm-5"> 
    <p>No Products to display. Please add products in Master Inventory.</p>
    </div>
    </div>
    <?php } ?>


<div class="col-sm-8">
 
     <div id="mselect">
      <select class="js-example-basic-multiple js-states form-control"  style="height: 75px" multiple="multiple" class="product" id="my-select" name="my-select[]" data-validation="required" data-validation-error-msg-required="Please select products">
    
      
          
         

          <option value="">Select Showroom First</option>
       
      </select>
    </div>
</div>

</div>
</div>
</div>




 

<!-- <div class="form-group">
  
    <label for="" class="control-label col-sm-2">Count:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="count" name="count" value=""><span class="error_form" id="count_error_message"></span>
</div>
   
 
</div>

</div>
</div> -->
<!-- 
<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Image:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="file" placeholder=""  id="image" name="image" value=""><span class="error_form" id="image_error_message"></span>
</div>
   
 
</div>

</div>
</div> -->

<div class="form-group">
<div class="row">
<div class="col-sm-push-9 col-sm-3">
<input type="submit" class="btn btn-success btn-lg" value=Add>

</div>
</div>
</div>
</form>
</div>
						
			
	
            <?php
            include('includes/footer.php');
            ?>

             <script>

$(document).ready(function(){
 // alert('sss');
  $('#Sel1').change(function(){
    //alert('Hai');
    
    var showroom_id=$(this).val();
    if(showroom_id)
    {
      $.ajax({
       type:'POST',
        url:'showroom_product.php',
       data:'showroom_id='+showroom_id,
        success:function(product){
          console.log(product);
          $('#my-select').append(product);
        }
      });
    }
    else {
       console.log('no value');
      $('#my-select').append('<option value="">Select Showroom First</option>');
    }

});
});



</script>

            <script> 
$(document).ready(function(){

	  //  $("a[href='#master']").attr("aria-expanded", "true").addClass("");
 $("#product").attr("aria-expanded", "true").addClass("children collapse in");
 $("#addpro").attr("class","active");
 $("#home").attr("class","");
	  });
</script>

            <script>

          $('#my-select').select2({
  placeholder: 'Type to select a product',
   selectOnClose: false,
   closeOnSelect: false
});  	










            </script>