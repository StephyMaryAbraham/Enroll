<?php 
require("connection.php");
include('includes/header.php');
include('includes/sidebar.php');
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><b>Add Master Inventory by Excel Upload</b></h1>
			</div>
		</div>

			
			<div class="container-fluid">
	
	 <?php 	 $msg->display(); ?>
	
	<form class="form-horizontal" id="formid" action="excel_action.php" method="post" enctype="multipart/form-data">

		
			<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Upload excelsheet:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-6">
 
     
      <input id="file" type="file" name="userfile" multiple="multiple"  data-validation="required" data-validation-allowing="xlsx" data-validation-error-msg-required="Please upload an excel file">
</div>

</div>

</div>
</div>

<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Upload Images:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-6">
 
     
      <input type="file" name="images[]" id="images"  multiple="multiple" data-validation="mime size" 
		 data-validation-allowing="jpg, png, jpeg">
</div>

</div>

</div>
</div>

<div class="form-group">
  
    <label for="sel1" class="control-label col-sm-2">Excel sample:</label>
    
    <div class="col-sm-10">
    <div class="row">
    
<div class="col-sm-6">
 
  <a href="../uploadFiles/excel_inventoy.xlsx" class="btn btn-info">Download</a>   
      
</div>

</div>

</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-sm-offset-6 col-sm-6">
<input type="submit" class="btn btn-success btn-lg" value="Add">
</div>
</div>
</div>

</form>
	</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script> 
$(document).ready(function(){

	  //  $("a[href='#master']").attr("aria-expanded", "true").addClass("");
 $("#master").attr("aria-expanded", "true").addClass("children collapse in");
 $("#addexcel").attr("class","active");
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
            	
$().ready(function(){



                    $("#formid").validate({

                    	rules: {
                            
                             userfile   : {
                             	required : true,
                             	extension: "xls"
                             },
                             images     : {

                             	required : true,
                             	extension: "jpg|png|jpeg|gif"
                             }	
                             	
                             
                    		
                    	},

                    	messages : {
                    		
                    		userfile: {
                    			required: "Please upload excel",
                    			extension: "plaese"
                    			
                    		},
                    		images     : {
                                required: "Please upload excel",
                             	extension: "Please select jpg,png,jpeg files"
                             }
                    	}
                    });

            		});
            </script>