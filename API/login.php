<?php
ob_start();
// session_start();
require_once 'dbinfo.php';

// Session storage verification
// TO DO: include web tokens and token verification

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $upass = $_POST['pass'];


    //sha dencrypt password
    $password = hash('sha256', $upass);
    $stmt = $conn->prepare("SELECT id, first_name, last_name, date_of_birth, password FROM users WHERE email= ?");


    $stmt->bind_param("s", $email);

    $stmt->execute();
    // Retrieve results from query
    $res = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $count = $res->num_rows;
    if ($count == 1 && $row['password'] == $password) {
        $_SESSION['user'] = $row['id'];
        header("Location: index.php");
    } elseif ($count == 1) {
        $errMSG = "Incorrect password";
    } else $errMSG = "User not found";
}
?>