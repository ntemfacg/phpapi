<?php

header("Access-Control-Allow-Origin: http://localhost/sample_frontend/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'dbinfo.php';
include_once 'objects/User.php';

$first_name = "";

$last_name = "";

$email = "";

$date_of_birth = "";

$password = "";

$database = new db();

if ($database->connect()) {
    echo "Connected";
}

?>