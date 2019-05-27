<?php

require 'dbinfo.php';

$first_name = "";

$last_name = "";

$email = "";

$date_of_birth = "";

$password = "";

session_start();

class hrdb extends db {
    $this->connect();
}

$database = new hrdb();

if ($database.connect()) {
    echo "Connected";
}

?>