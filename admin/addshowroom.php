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
				<h1 class="page-header"><b>Add Showroom</b></h1>
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
           $sql="select * from en_showroom order by showroom_id desc limit 1";
$statement=$con->prepare($sql);

$statement->execute();
$count=$statement->rowCount();

if($count>0)
{
	$rows=$statement->fetch();
	$name=$rows['showroom_name'];
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

	
	
	
	<form class="form-horizontal" action="showroom_action.php" method="post">	

		<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Name:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="opassword" name="name" value=""></div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Address:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="password" name="address" value=""></div>
   
 
</div>

</div>
</div>

<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Location:</label>
	
	<div class="col-sm-10">
	<div class="row">
	
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="cpassword" name="location" value=""></div>
   
 
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
						
			
	
            <?php
            include('includes/footer.php');
            ?>