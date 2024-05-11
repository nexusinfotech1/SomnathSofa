<?php session_start();

								if( ! isset($_SESSION["login_id"]) ) {
												header("location: login.php");
								}
?>
<?php 

		require("classes/dbo.class.php");

		/*$customer_q = "Select * from users";

		$customer_res = $db->get($customer_q);*/

?>
<!DOCTYPE html>
<html>
<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title>Somnath Sofa</title>
		
		<?php include('includes/header.php'); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
		<?php include('includes/head.php'); ?>
		<aside class="main-sidebar"> 
	<?php include('includes/sidebar.php');?>
		</aside>

		<div class="content-wrapper">
					
								<br><br><br><br><br><br><br><br><br>
								<center>
									<img src="assets/img/logo.png" height="30%" width="30%">
								</center>		
								<br>
								<center>
									    <h3>Welcome to SSH Invoice Management System</h3>
								</center>

					
		</div>
		

		<footer class="main-footer">
	<?php include('includes/footer.php'); ?>
		</footer>
</div>

<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/js/core.js"></script>
<script src="assets/js/charts.js"></script>
<script src="assets/js/animated.js"></script>
<script>
	
	am4core.useTheme(am4themes_animated);

	var chart = am4core.create("mychart", am4charts.PieChart3D);

	chart.legend = new am4charts.Legend();
	chart.legend.position = "right";

	chart.data = [

		@foreach($chart_cat as $c)

		{
						"cat": "{{ $c->name }}",
						"tutorials_count": {{ $c->tutorials_count }}
		},

		@endforeach

	];

	chart.innerRadius = am4core.percent(30);
	chart.depth = 30;

	var series = chart.series.push(new am4charts.PieSeries3D());
	series.dataFields.value = "tutorials_count";
	series.dataFields.category = "cat";
	series.dataFields.depthValue = "tutorials_count";
	series.slices.template.cornerRadius = 5;
	series.colors.step = 3;

</script>

</body>
</html>
