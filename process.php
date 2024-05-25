<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data"; // Use your form data

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the search query is submitted
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM teachers WHERE name LIKE '%$search_query%' OR email LIKE '%$search_query%'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Get User Data</h1>

    <!-- Search form -->
    <form method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter name or email">
        <input type="submit" value="Search">
    </form>

    <br>

    <h1>POST User Data</h1>

    <!--Upload form -->
    <form method="POST" action="submit.php">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter name">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter email">
        <label for="age">Age: </label>
        <input type="number" name="age" id="age" placeholder="Enter age">
        <input type="submit" value="Upload">
    </form>

    <br>

    <!-- Display user data -->
    <table>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
