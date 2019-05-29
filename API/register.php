<?php

header("Access-Control-Allow-Origin: http://localhost/sample_frontend/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
include_once 'dbinfo.php';

if (isset($_POST['signup'])) {

    // secure data via parametization
    $first_name = mysqli_real_escape_string(strip_tags(trim($_POST['first_name']))); 
    $last_name = mysqli_real_escape_string(strip_tags(trim($_POST['last_name'])));
    $date_of_birth = mysqli_real_escape_string(strip_tags(trim($_POST['date_of_birth'])));
    $email = mysqli_real_escape_string(strip_tags(trim($_POST['email'])));
    $pass = mysqli_real_escape_string(strip_tags(trim($_POST['password'])));

    // Encryption with sha256;
    $password = hash('sha256', $pass);

    // check email exist or not
    $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;


    //check for existing user

    if ($count == 0) {

        $stmts = $conn->prepare("INSERT INTO users(first_name, last_name, date_of_birth, email, password) VALUES(?, ?, ?, ?, ?)");
        $stmts->bind_param("sssss", $first_name, $last_name, $date_of_birth, $email, $password);
        $res = $stmts->execute();//get result
        $stmts->close();

        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; 
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location: index.php");
                exit;
            }

        } else {
            $errTyp = "danger";
            $errMSG = ($password);
        }

    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }

}
?>