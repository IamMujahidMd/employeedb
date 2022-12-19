<!DOCTYPE html>
<?php
session_start();
include "conn.php";
include "include/auth.php";


// Select the employee table
// $query = 'SELECT * FROM employee';
// $stmt = $dbh->prepare($query);
// $stmt->execute();
// $result = $stmt->fetchAll();
// ?>


// ?>

// <script>
// 	function refreshTable() {
// 		$.ajax({
// 			url: 'employee.php', 
// 			success: function (data) {
// 				$('#employee-table').html(data); 
// 			}
// 		});
// 	}

// </script>
<?php
include "include/admin_header.php"
	?>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<?php include "include/admin_navigation.php" ?>
		<div id="login-overlay" class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Employee List</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<div class="well">
								<?php
                            // Retrieve salary data from the database
                            $query = "SELECT * FROM salary";
                            $stmt = $dbh->prepare($query);
                            $stmt->execute();
                            $salaries = $stmt->fetchAll();
                            ?>

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Phone No</th>
											<th>Emp Code</th>
											<th>Salary</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($salaries as $salary) { ?>
										<tr>
											<td>
												<?php echo $salary['name']; ?>
											</td>
											<td>
												<?php echo $salary['phone_no']; ?>
											</td>
											<td>
												<?php echo $salary['emp_code']; ?>
											</td>
											<td>
												<?php echo $salary['payable_salary']; ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<!-- jQuery -->
	<script src="./js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/insert.js"></script>
</body>

</html>