<?php
$servername = "localhost";
$username = "root"; // default username for WampServer
$password = ""; // default password for WampServer
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>