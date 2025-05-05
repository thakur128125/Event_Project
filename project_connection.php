<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root"; 
$password = "128125"; 
$dbname = "festdatabase"; 

$conn = new mysqli($servername, $username, $password, $dbname);
?>
