<?php session_start();

        if( ! isset($_SESSION["login_id"]) ) {
            header("location: login.php");
        }
?>

<?php 

	require("classes/dbo.class.php");

	$fd_q = "Select * from feedbacks";

	$fd_res = $db->get($fd_q);

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
	<section class="content">
		<div class="box box-primary">
							
			<div class="box-header with-border">

			<h3 class="box-title"><strong>Display Message</strong></h3>

					<div class="box-tools pull-right">

							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

						</div>

					</div>

					<div class="box-body no-padding">
						
						<table class="datatable table table-bordered">

							<thead>
								<tr>
									<th width="30" align="center"></th>
									<th>Name</th>
									<th>E-mail</th>
									<th>Message</th>
								</tr>

							</thead>

								<?php
										while ($fd_row=mysqli_fetch_assoc($fd_res)) 
										{
											echo '<tr>
														<td>
															<a href="process_del_feedbacks.php?fd_id='.$fd_row["fd_id"].'">
															<i class="fa fa-fw fa-times text-danger"></i>
															</a>
														</td> 

														<td>
																'.$fd_row["fd_name"].',
														</td>
														<td>	
																'.$fd_row["fd_email"].',
														</td>
														<td>
																'.$fd_row["fd_message"].',
														</td>
												</tr>';
										}
										
								 ?>
							
						</table>
					</div>
				</div>
			</div>
		</div>   
	</section>
		</div>
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
