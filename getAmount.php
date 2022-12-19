<?php
// Include the conn.php file to establish a database connection
include "conn.php";

// Check that the earningTypeId parameter is set
if (isset($_POST['earningTypeId'])) {
    // Sanitize the input to prevent SQL injection attacks
    $earningTypeId = intval($_POST['earningTypeId']);

    // Query the employee_earning table for the amount of the selected earning type and 
    $query = "SELECT amount FROM employee_earning WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$earningTypeId]);
    $amount = $stmt->fetchColumn();

    // Return the amount to the client
    echo $amount;
}
