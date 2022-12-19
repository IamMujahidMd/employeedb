<?php
// Connect to the database
$host = 'localhost';
$dbname = 'database_name';
$username = 'username';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die('Error connecting to the database: ' . $e->getMessage());
}

// To Get amount from employee_earning or deduction table
if (isset($_POST['earning_type'])) {
    $earningType = $_POST['earning_type'];
    $stmt = $pdo->prepare('SELECT amount FROM employee_earning WHERE earning_type = :earning_type');
    $stmt->bindParam(':earning_type', $earningType);
    $stmt->execute();
    $amount = $stmt->fetchColumn();
    echo $amount;
} elseif (isset($_POST['deduction_type'])) {
    $deductionType = $_POST['deduction_type'];
    $stmt = $pdo->prepare('SELECT amount FROM deduction WHERE deduction_type = :deduction_type');
    $stmt->bindParam(':deduction_type', $deductionType);
    $stmt->execute();
    $amount = $stmt->fetchColumn();
    echo $amount;
}
