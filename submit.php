<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the database with data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO teachers (name, email, age) VALUES ('$name', '$email', $age)";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection
mysqli_close($conn);

// Redirect back to the form
header("Location: process.php");
exit();

?>
