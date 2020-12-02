<?php
$servername = "localhost";
$username = ""; //set mysql connection username here
$password = ""; //set mysql connection password here
$dbname = "aeom";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

?>
