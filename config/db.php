<?php

$conn = new mysqli("localhost","root","","online_shop");

if($conn->connect_error){
die("Connection failed");
}

session_start();

?>