<?php 
include('includes/header.php');
include('includes/sidebar.php');
if(isset($_SESSION["session_status"]))
        {
if($_SESSION["session_status"]=='success')
{
            unset($_SESSION["session_status"]);
            echo "<script>swal('Login Successfull');</script>";


    }

  }
?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<?php 	echo $msg->display();  ?>
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
        
       
            
            <?php
            include('includes/footer.php');
            ?>