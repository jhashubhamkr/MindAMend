<?php
session_start();
require_once 'RoiCalculator.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "ERROR: Invalid request method!";
}

$calculator = new RoiCalculator();
$errors = $calculator->validateFormData($_POST);

if (empty($errors)) {
    // No errors proceed with calculations;
    $response = $calculator->calculate($_POST);
    $_SESSION['response'] = $response;

    header('Location: ../report.php');
}else{
    $_SESSION['form_data'] = $_POST;
    $_SESSION['form_errors'] = $errors;

    header('Location: ../index.php');
}
?>