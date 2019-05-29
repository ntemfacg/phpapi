<?php

header("Access-Control-Allow-Origin: http://localhost/sample_frontend/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'dbinfo.php';
include_once 'objects/User.php';

// $first_name = "";

// $last_name = "";

// $email = "";

// $date_of_birth = "";

// $password = "";

$database = new db();

// if ($database->connect()) {
//     echo "Connected";
// }

// $user =new User($db);

$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->first_name = $data->first_name;
$user->last_name = $data->last_name;
$user->email = $data->email;
$user->date_of_birth = $data->date_of_birth;
$user->password = $data->password;
 
// use the create() method here
// create the user
if($user->create()){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
}

?>