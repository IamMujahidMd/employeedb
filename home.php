<!DOCTYPE html>
<?php
session_start();
include "include/auth.php";

?>


<?php
include "include/admin_header.php"
	?>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "include/admin_navigation.php" ?>
		<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<?php include "include/admin_footer.php" ?>
				<h4 class="text-success">YOU ARE LOGGED IN SUCCESSFULLY</h4>
				<h3>EXPLORE THE EMPLYOEE DATABASE FROM THE LEFT NAV BAR</h3>
				<!-- /.row -->
				<div class="col-xs-6">
				</div>
				<!-- Page Heading -->
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>