<?php 
require("connection.php");
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

				<h1 class="page-header"><b>View Showrooms</b></h1>
			</div>
		</div>



                   
        
                    

<br>
<br>
<br>
                    

                  
                    
		<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        	
                          
                            
                            <th colspan="6" style="background-color:#6495ED;text-align:center;">SHOWROOMS</th>
                           
                        </tr>
	<tr>
	<th style="background-color:#6495ED;text-align:center;">SI No</th>
	<th style="background-color:#6495ED;text-align:center;">Name</th>
	<th style="background-color:#6495ED;text-align:center;">Address</th>
  <th style="background-color:#6495ED;text-align:center;">Location</th>
  <th colspan="6" style="background-color:#6495ED;text-align:center;">Action</th>
  
	
	</tr>
        </thead>
        <tbody>
           
           <?php



$sql="select * from en_showroom";
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
            <td style="text-align:center;"><?php echo $showroom['showroom_address'];?></td>
            <td style="text-align:center;"><?php echo $showroom['showroom_location'];?></td>
            <td style="text-align:center;"><a class="btn btn-info" href="editshowroom">Edit</a></td>
            <td style="text-align:center;"><a class="btn btn-danger" href="editshowroom">Delete</a></td>
    
            	<?php 
 $x++;
               }

             }
               ?>
            
        </tbody>
			
						
			
                        </table>
                         
        </div>
                       

        
			<!-- <div class="pagination_links"> 
                
                         </div> -->
            <?php

            include('includes/footer.php');
            ?>

            