<?php session_start();

        if( ! isset($_SESSION["login_id"]) ) {
            header("location: login.php");
        }
?>

<?php

	require_once('classes/dbo.class.php');

	if( ! isset($_GET["id"]) || ! ctype_digit($_GET["id"])) { header("location: index.php"); exit; }

	$cat_q = "select * from categories where cat_id = '".$_GET["id"]."'";
	//die($q);

	$cat_res = $db->get($cat_q);

	if( mysqli_num_rows($cat_res) == 0 ) { header("location:index.php"); exit; }

	$row = mysqli_fetch_assoc($cat_res);

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

			<h1> <i class="fa fa-fw fa-cogs"></i>Category</h1>
		
	</section>
	
	<section class="content">
			
		<div class="row">
			
			<div class="col-md-8">

				<div class="box box-primary">
							
							<div class="box-header with-border">

						<h3 class="box-title"><strong>Edit Category</strong></h3>

						<div class="box-tools pull-right">
								
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						</div>

					</div>

					<div class="box-body">

						<div class="row">

					<form action="process_edit_category.php" method="post">
					<input type="hidden" name="cat_id" value="<?php echo $row["cat_id"] ?>" />
							
							<div class="form-group">

								<div class="col-md-8">
							
									<label>Category name</label>

									<input type="text" name="name" class="form-control" value="<?php echo $row["cat_name"] ?>">

								</div>

								
							</div>

						</div>
						<br>

							<hr>
							
								<input type="submit" value="Submit" class="btn btn-primary pull-right">
						</form>
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
