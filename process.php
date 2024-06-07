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

// Handle POST requests for insert, update, and delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $sql = "INSERT INTO teachers (name, email, age) VALUES ('$name', '$email', '$age')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $sql = "UPDATE teachers SET name='$name', email='$email', age='$age' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM teachers WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
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

    <!-- Update form -->
    <form method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id" placeholder="Enter ID to update" required>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter name">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter email">
        <label for="age">Age: </label>
        <input type="number" name="age" id="age" placeholder="Enter age">
        <input type="submit" name="update" value="Update">
    </form>

    <br>

    <!-- Delete form -->
    <form method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id" placeholder="Enter ID to delete" required>
        <input type="submit" name="delete" value="Delete">
    </form>

    <br>

    <!-- Display user data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
