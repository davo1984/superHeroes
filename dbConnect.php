<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$GLOBALS ["conn"]=$conn;
// use global conn everywhere

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

?>