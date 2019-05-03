<?php 
require("connection.php");
session_start();
include('includes/header.php');
include('includes/sidebar.php');



?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b>Edit Product</b></h1>
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

	<?php

	if(isset($_SESSION["session_status"]))
	{
		
		if($_SESSION["session_status"]=='success')
		{
           $sql="select * from en_product order by product_id desc limit 1";
$statement=$con->prepare($sql);

$statement->execute();
$count=$statement->rowCount();

if($count>0)
{
	$rows=$statement->fetch();
	$name=$rows['product_name'];
}

			?>
			<div class="alert alert-success">
    <strong><?php echo $name; ?></strong> is successfully added.
  </div>

  <?php
 
		}
		else if($_SESSION["session_status"]=='failed')
		{
			?>
			<div class="alert alert-danger">
    <strong></strong>is failed.
  </div>
  <?php
   
	}
	unset($_SESSION['session_status']);
}
	?>
<?php  
    $id=$_REQUEST['id'];
	$query="select * from en_product join en_showroom on en_product.showroom_id=en_showroom.showroom_id where en_product.product_id='$id'";

$statement=$con->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($showroom=$statement->fetch())

{
	
	?>
	<form class="form-horizontal" id="productform" action="updateproduct.php"  method="post" enctype="multipart/form-data">	

		<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Showroom:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
 
     
      <select class="form-control" id="Sel1" id="showroom" name="showroomid"><span class="error_form" id="showroom_error_message"></span>
        <option value="<?php echo $showroom['showroom_id'];?>"><?php echo $showroom['showroom_name'];?></option>
		<?php
          $sql="select * from en_showroom";
          $statement=$con->prepare($sql);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($show=$statement->fetch())

{
          
          ?>
        <option value="<?php echo $showroom['showroom_id']?>"><?php echo $show['showroom_name']?></option>
        <?php
          }
             } ?>
      </select>
</div>

</div>
</div>
</div>

		<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Name:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="product" name="product" value="<?php echo $showroom['product_name'];?>"><span class="error_form" id="product_error_message"></span>
</div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Count:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="count" name="count" value="<?php echo $showroom['product_count'];?>"><span class="error_form" id="count_error_message"></span>
</div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Image:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-10">
    <span><img src="uploadFiles/product/<?php echo $showroom['product_image'];?>" alt="" height="200" width="200">
  <input type="file" placeholder=""  id="image" name="image" value=""></span>
</div>
   
 
</div>

</div>
</div>
<input type="hidden" name="id" value="<?php echo $showroom['product_id'];?>">
<div class="form-group">
<div class="row">
<div class="col-sm-offset-6 col-sm-6">
<input type="submit" class="btn btn-success btn-lg" value="Update">

</div>
</div>
</div>
</form>
</div>
						
			
	
            <?php
                }
        }
            include('includes/footer.php');
            ?>

            <script>

             // $(function(){

             // 	$("#showroom_error_message").hide();
             // 	$("#product_error_message").hide();
             // 	$("#count_error_message").hide();
             // 	$("#image_error_message").hide();


             // 	var error_showroom = false;
             // 	var error_product = false;
             // 	var error_count = false;
             // 	var error_image = false;
             
             // $("#showroom")focusout(function(){
             //      check_showroom();
             // });
             // $("#product")focusout(function(){
             //      check_product();
             // });
             // $("#count")focusout(function(){
             //      check_count();
             // });
             // $("#image")focusout(function(){
             //      check_image();
             // });

             // });



            	$().ready(function(){

$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");

                    $("#productform").validate({

                    	// rules: {
                     //         showroomid: { 
                     //         	valueNotEquals: "default" 
                     //         },
                             product : "required",
                             count   : {
                             	required: true,
                             	number  : true

                             },
                             // image   : {
                             // 	required : true,
                             // 	extension: "jpg,png,jpeg,gif"
                             // }
                    		
                    	},

                    	messages : {
                    		// showroomid : { 
                    		// 	valueNotEquals: "Please select an showroom" 
                    		// },
                    		product  : "Please enter the product name",
                    		count    : {
                    		   required : "Please enter the count of products",
                    		   number   : "Please enter an interger"	
                    		},
                    		// image: {
                    		// 	required: "Please upload product image",
                    		// 	extension: "Please select jpg,png,jpeg files"
                    		// }
                    	}
                    });

            		});

            </script>