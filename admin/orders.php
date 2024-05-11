<?php session_start();

        if( ! isset($_SESSION["login_id"]) ) {
            header("location: login.php");
        }
?>

<?php 

	require("classes/dbo.class.php");

	$pro_q = "Select * from products";

	$pro_res = $db->get($pro_q);

	$cat_q = "Select * from categories";

	$cat_res = $db->get($cat_q);

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

			<h1> <i class="fa fa-fw fa-shopping-cart"></i>Orders</h1>
		
	</section>
	
	<section class="content">
			
		<div class="row">
			
			<div class="col-md-12">

				<div class="box box-primary">
							
							<div class="box-header with-border">

						<h3 class="box-title"><strong>Add Orders</strong></h3>

						<div class="box-tools pull-right">
								
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						</div>

					</div>

					<div class="box-body">

							<form action="process_orders.php" method="post" id="frm1" enctype="multipart/form-data">

						<div class="row">

							<div class="form-group">

								<div class="col-md-6">
							
									<label>Date</label>

									<input type="date" name="date" class="form-control">

								</div>
								

								<div class="col-md-6">
							
									<label>Customer</label>

									<select name="cus" class="form-control">
													<?php
														while($cus_row = mysqli_fetch_assoc($cus_res)) {
															echo '<option value="'.$cus_row["cus_id"].'">'.$cus_row["cus_name"].'</option>';
														}
													?>
									</select>

								</div>

								<div class="col-md-6">
							
									<label>Category</label>

									<select name="cat" class="form-control">
													<?php
														while($cat_row = mysqli_fetch_assoc($cat_res)) {
															echo '<option value="'.$cat_row["cat_id"].'">'.$cat_row["cat_name"].'</option>';
														}
													?>
									</select>

								</div>

								<div class="col-md-6">
							
									<label>Color</label>

									<input type="text" name="name" class="form-control">

								</div>

									<div class="col-md-4">
							
									<label>Size</label>

								<input type="text" name="size" class="form-control">  

								</div>	
								<div class="col-md-4">
							
									<label>Rate</label>

									<input type="text" name="rate" class="form-control">

								</div>

								<div class="col-md-4">
							
									<label>Qty.</label>

									<input type="text" name="qty" class="form-control">

								</div>

								<div class="col-md-4">
							
									<label>Amount</label>

									<input type="text" name="amt" class="form-control">

								</div>
								<br>
								
							</div>

						</div>
						<br>

							<hr>
							
								<input type="submit" value="Submit" class="btn btn-primary pull-right">
						</form>
					</div>		
				</div>

		<div class="box box-primary">
							
			<div class="box-header with-border">

				<h3 class="box-title"><i class="fa fa-fw fa-shopping-cart"></i><strong>Display Orders</strong></h3>

					<div class="box-tools pull-right">

							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

						</div>

					</div>

					<div class="box-body no-padding">
						
						<table class="datatable table table-stripped">

							<thead>

								<tr>
									<th></th>
									<th width="20" align="center"></th>
									<th>Date</th>
									<th>Customer</th>
									<th>Category</th>
									<th>Color</th>
									<th>Size</th>
									<th>Rate</th>
									<th>Qty</th>
									<th>Amount</th>
								</tr>

							</thead>

								<?php
										while ($product_row=mysqli_fetch_assoc($pro_res)) 
										{
											echo '<tr>
														<td>

															<a href="product_edit.php?id='.$product_row["pd_id"].'"><i class="fa fa-edit fa-fw"></i></a>

														</td>
										
														<td>
															<a href="process_del_product.php?pd_id='.$product_row["pd_id"].'">
															<i class="fa fa-fw fa-times text-danger"></i>
															</a>
														</td> 

														<td>
																'.$product_row["cus_name"].'
														</td>
														<td>
																'.$product_row["cat_name"].'
														</td>
														<td>
																'.$product_row["pd_name"].'
														</td>
														<td>
																'.$product_row["size"].'
														</td>
														<td>
																'.$product_row["rate"].'
														</td>
														<td>
																'.$product_row["qty"].'
														</td>
														<td>
																'.$product_row["amount"].'
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
