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
?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
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
                                                <!-- Add a hidden input field to store the selected earning type amount -->
                                                <input type="hidden" id="earning_type_amount"
                                                    name="earning_type_amount">
                                                <!--When earning type select element to trigger an AJAX request to retrieve the selected earning type amount when a new option is selected -->
                                                <select class="form-control" id="earning_type" name="earning_type"
                                                    onchange="getEarningTypeAmount(this.value)" multiple>
                                                    <?php foreach ($data = $earningTypes as $earningType) { ?>
                                                    <option value="<?php echo $earningType['id']; ?>">
                                                        <?php echo $earningType['earning_type']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select><br>
                                                <!--label and an input field for the earning type amount -->
                                                <label class="control-label" for="earning_type_amount">Earning Type
                                                    Amount:</label>
                                                <input class="form-control" type="text" id="earning_type_amount_display"
                                                    name="earning_type_amount_display" readonly>

                                                <!-- JavaScript function to make an AJAX request to retrieve the selected earning type amount -->
                                                <script>
                                                    function getEarningTypeAmount(earningTypeId) {
                                                        var xhttp = new XMLHttpRequest();
                                                        xhttp.onreadystatechange = function () {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                // Functions for hidden and display input fields with the retrieved earning type amount
                                                                document.getElementById("earning_type_amount").value = this.responseText;
                                                                document.getElementById("earning_type_amount_display").value = this.responseText;
                                                            }
                                                        };
                                                        xhttp.open("GET", "get_earning_type_amount.php?earningTypeId=" + earningTypeId, true);
                                                        xhttp.send();
                                                        
                                                    }
                                                </script>

                                                <!-- Retrieve deduction types from the database -->
                                                <?php
                                                $query = "SELECT * FROM deduction";
                                                $stmt = $dbh->prepare($query);
                                                $stmt->execute();
                                                $deductionTypes = $stmt->fetchAll();
                                                ?>

                                                <div class="form-group">
                                                    <label class="control-label" for="deduction_type">Deduction
                                                        Type:</label>
                                                    <!-- hidden input field to store the selected deduction type amount -->
                                                    <input type="hidden" id="deduction_amount" name="deduction_amount">
                                                    <!-- deduction type select element to trigger an AJAX request to retrieve the selected deduction type amount when a new option is selected -->
                                                    <select class="form-control" id="deduction_type"
                                                        name="deduction_type" multiple
                                                        onchange="getDeductionTypeAmount(this.value)">
                                                        <?php foreach ($data = $deductionTypes as $deductionType) { ?>
                                                        <option value="<?php echo $deductionType['id']; ?>">
                                                            <?php echo $deductionType['deduction_type']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select><br>
                                                    <!-- Add a label and an input field for the deduction type amount -->
                                                    <label class="control-label" for="deduction_amount">Deduction
                                                        Amount:</label>
                                                    <input class="form-control" type="text"
                                                        id="deduction_amount_display" name="deduction_amount_display"
                                                        readonly>
                                                </div>

                                                <!-- JavaScript function to make an AJAX request to retrieve the selected deduction type amount -->
                                                <script>
                                                    function getDeductionTypeAmount(deductionTypeId) {
                                                        var xhttp = new XMLHttpRequest();
                                                        xhttp.onreadystatechange = function () {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                // display input fields with the retrieved deduction type amount
                                                                document.getElementById("deduction_amount").value = this.responseText;
                                                                document.getElementById("deduction_amount_display").value = this.responseText;
                                                            }
                                                        };
                                                        xhttp.open("GET", "get_deduction_type_amount.php?deductionTypeId=" + deductionTypeId, true);
                                                        xhttp.send();
                                                    }
                                                </script>

                                                <div class="form-group">
                                                    <label class="control-label" for="payable_salary">Payable
                                                        Amount:</label><br>
                                                    <input class="form-control" type="text" id="payable_salary"
                                                        name="payable_salary"><br>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" id="submit" name="submit"
                                                        class="btn btn-success btn-lg btn-block">Add</button>
                                                </div>

                                        </form> 

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
<!-- script to insert the data in to database -->
<script>
    $(document).ready(function () {
        $("#myform").on('submit', function (event) {
            event.preventDefault();

            var name = $("#name").val();
            var phone_no = $("#phone_no").val();
            var emp_code = $("#emp_code").val();

            var earning_type = $("#earning_type").val();
            var earning_type_amount = $("#earning_type_amount").val();

            var deduction_type = $("#deduction_type").val();
            var deduction_amount = $("#deduction_amount").val();

            var payable_salary = $("#payable_salary").val();

            $.ajax({
                url: "add_salary_process.php",
                method: "POST",
                data: {
                    name: name,
                    phone_no: phone_no,
                    emp_code: emp_code,
                    earning_type: earning_type,
                    earning_type_amount: earning_type_amount,
                    deduction_type: deduction_type,
                    deduction_amount: deduction_amount,
                    payable_salary: payable_salary
                },
                success: function (data) {
                    $("form")[0].reset();
                    $("#success").css("display", "block");
                    $("#success").css("display", "block");
                    $("#success").text("Record Inserted Successfully");
                    setTimeout(function () {
                        $("#success").css("display", "none");
                    }, 3000);
                }
            });
        });
    });
</script>