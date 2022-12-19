<?php

if (isset($_POST['name']) && isset($_POST['phone_no']) && isset($_POST['emp_code']) && isset($_POST['earning_type']) && isset($_POST['earning_type_amount']) && isset($_POST['deduction_type']) && isset($_POST['deduction_amount']) && isset($_POST['payable_salary'])) {
    // retrieve the form data
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $emp_code = $_POST['emp_code'];
    $earning_type = $_POST['earning_type'];
    $earning_type_amount = $_POST['earning_type_amount'];
    $deduction_type = $_POST['deduction_type'];
    $deduction_amount = $_POST['deduction_amount'];
    $payable_salary = $_POST['payable_salary'];

    // insert the data into the database
    try {
        // connect to the database
        $db = new PDO("mysql:host=localhost;dbname=employeedb", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // insert the data into the salary table
        $query = "INSERT INTO salary (name, phone_no, emp_code, earning_type, earning_type_amount, deduction_type, deduction_amount, payable_salary) VALUES (:name, :phone_no, :emp_code, :earning_type, :earning_type_amount, :deduction_type, :deduction_amount, :payable_salary)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone_no', $phone_no);
        $stmt->bindParam(':emp_code', $emp_code);
        $stmt->bindParam(':earning_type', $earning_type);
        $stmt->bindParam(':earning_type_amount', $earning_type_amount);
        $stmt->bindParam(':deduction_type', $deduction_type);
        $stmt->bindParam(':deduction_amount', $deduction_amount);
        $stmt->bindParam(':payable_salary', $payable_salary);
        $stmt->execute();

        // check if the data was inserted successfully
        if ($stmt->rowCount() > 0) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>