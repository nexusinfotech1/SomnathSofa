<?php session_start();

        if( ! isset($_SESSION["login_id"]) ) {
            header("location: login.php");
        }
?>

<?php 

	require("classes/dbo.class.php");

	$cus_q = "Select * from customers";

	$cus_res = $db->get($cus_q);

?>
<!DOCTYPE html>
<html>
<head>

	<style>
            label.error {
                color: red;
            }
    </style>
  		
		<?php include ('includes/header.php'); ?>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

		<?php include('includes/head.php'); ?>
		<aside class="main-sidebar"> 
				<?php include ('includes/sidebar.php'); ?>
	
		</aside>

		<div class="content-wrapper">

	<section class="content-header">

			<h1> <i class="fa fa-fw fa-users"></i>Customers</h1>
		
	</section>
	
	<section class="content">
			
		<div class="row">
			
			<div class="col-md-8">

				<div class="box box-primary">
							
							<div class="box-header with-border">

						<h3 class="box-title"><strong>Add Customers</strong></h3>

						<div class="box-tools pull-right">
								
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						</div>

					</div>

					<div class="box-body">

							<form action="process_customers.php" method="post" id="frm1" enctype="multipart/form-data">

						<div class="row">

							
							<div class="form-group">

								<div class="col-md-8">
							
									<label>Customer name</label>

									<input type="text" name="name" class="form-control">

								</div>
								<br>
							</div>
				</div>
				<br>
				<!-- <div class="row">

						<input type="file" name="thumb">								
					
				</div> -->
						<br>

							<hr>
							
								<input type="submit" value="Submit" class="btn btn-primary pull-right">
						</form>
					</div>		
				</div>

		<div class="box box-primary">
							
			<div class="box-header with-border">

				<h3 class="box-title"><strong>Display Customers</strong></h3>

					<div class="box-tools pull-right">

							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

						</div>

					</div>

					<div class="box-body no-padding">
						
						<table class="datatable table table-stripped">

							<thead>

								<tr>
									<th></th>
									<th width="30" align="center"></th>
									<th>Name</th>
									
								</tr>

							</thead>

								<?php
										while ($cus_row=mysqli_fetch_assoc($cus_res)) 
										{
											echo '<tr>
														<td>

															<a href="customer_edit.php?id='.$cus_row["cus_id"].'"><i class="fa fa-edit fa-fw"></i></a>

														</td>
										
														<td>
															<a href="process_del_customer.php?cus_id='.$cus_row["cus_id"].'">
															<i class="fa fa-fw fa-times text-danger"></i>
															</a>
														</td> 

														<td>
																'.$cus_row["cus_name"].'
														</td>
												</tr>';
										}
										
								 ?>

							<tbody>
								
							</tbody>
						</table>

					</div>
						
				</div>
				
			</div>

		</div>   

	</section>

		</div>

		<footer class="main-footer">
					<?php include ('includes/footer.php'); ?>
		</footer>

</div>

<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script type="text/javascript">
	
	$("#frm1").validate({
            "rules" : 
            {
                "name":
                {
                	"required":true
                }
                
            },
         "messages" : 
         {
                    "name" : 
                    {
                        "required" : "Name is required"
                    }
       });
</script>

</body>
</html>
