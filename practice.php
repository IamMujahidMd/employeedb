<!DOCTYPE html>
<?php
session_start();
include "conn.php";
include "include/auth.php";
include "include/admin_header.php";


// Retrieve earning types from the database
$query = "SELECT * FROM employee_earning";
$stmt = $dbh->prepare($query);
$stmt->execute();
$earningTypes = $stmt->fetchAll();
// employee_earning table
// id	 earning_type Ascending 1	amount
// 3     Bonuses                    1000.00
// 5     Dearness Allowance         1000.00
// 1     overtime                   1000.00
// 4     Travelling Allowance       2000.00

// Retrieve deduction types from the database
$query = "SELECT * FROM deduction";
$stmt = $dbh->prepare($query);
$stmt->execute();
$deductionTypes = $stmt->fetchAll();
// deduction table contains
// id	deduction_type	amount
// 1    EMI             1000.00
// 2    Insurances      500.00
// 3    Taxes           50.00

?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">


                <!-- HOSTEL TABLE END -->

                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>


                <div id="login-overlay" class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add Employee Salary</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="well">
                                        <form class="form" id="myform" method="post">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Name:</label><br>
                                                <input class="form-control" type="text" id="name" name="name"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="phone_no">Phone No:</label><br>
                                                <input class="form-control" type="text" id="phone_no"
                                                    name="phone_no"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="emp_code">Emp Code:</label><br>
                                                <input class="form-control" type="text" id="emp_code"
                                                    name="emp_code"><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="earning_type">Earning Type:</label>
                                                <select class="form-control" id="earning_type" name="earning_type"
                                                    multiple onchange="getAmount(this.value)">
                                                    <?php foreach ($data = $earningTypes as $earningType) { ?>
                                                    <option value="<?php echo $earningType['id']; ?>">
                                                        <?php echo $earningType['earning_type']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="earning_amount">Earning
                                                    Amount:</label><br>
                                                <?php foreach ($earningTypes as $amount) { ?>
                                                <input class="form-control" type="text" id="earning_amount"
                                                    name="earning_amount" value="<?php echo $amount['amount']; ?>">
                                                </input>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="earning_type_amount">Earning Type
                                                    Amount:</label><br>
                                                <input class="form-control" type="text" id="earning_type_amount"
                                                    name="earning_type_amount" readonly><br>
                                            </div>
                                            <small>Please select multiple option using ctrl+</small>

                                            <div class="form-group">
                                                <label class="control-label" for="deduction_type">Deduction
                                                    Type:</label>
                                                <select class="form-control" id="deduction_type" name="deduction_type"
                                                    multiple>
                                                    <?php foreach ($deductionTypes as $deductionType) { ?>
                                                    <option value="<?php echo $deductionType['id']; ?>">
                                                        <?php echo $deductionType['deduction_type']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select><br>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="deduction_amount">Deduction
                                                    Amount:</label><br>
                                                <?php foreach ($deductionTypes as $amount) { ?>
                                                <input class="form-control" type="text" id="deduction_amount"
                                                    name="deduction_amount" value="<?php echo $amount['amount']; ?>">
                                                </input>
                                                <?php } ?>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basic_salary">Basic
                                                    Salary:</label><br>
                                                <input class="form-control" type="text" id="basic_salary"
                                                    name="basic_salary"><br>
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="butsave">Submit</button>
                                        </form>
                                    </div>
                                </div>
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
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="./js/insert.js"></script>
</body>

</html>