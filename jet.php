<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jet"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST requests for insert, update, and delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insert'])) {
        $topic = $_POST['topic'];
        $score = $_POST['score'];
        $sql = "INSERT INTO computer (topic, score) VALUES ('$topic', '$score')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $topic = $_POST['topic'];
        $score = $_POST['score'];
        $sql = "UPDATE computer SET topic='$topic', score='$score' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM computer WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Fetch all records to display
$sql = "SELECT * FROM computer";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Jet Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Manage Computer Records</h1>

    <!-- Insert form -->
    <form method="POST">
        <h2>Insert Record</h2>
        <label for="topic">Topic: </label>
        <input type="text" name="topic" id="topic" placeholder="Enter topic" required>
        <label for="score">Score: </label>
        <input type="number" name="score" id="score" placeholder="Enter score" required>
        <input type="submit" name="insert" value="Insert">
    </form>

    <br>

    <!-- Update form -->
    <form method="POST">
        <h2>Update Record</h2>
        <label for="id">ID: </label>
        <input type="number" name="id" id="id" placeholder="Enter ID to update" required>
        <label for="topic">Topic: </label>
        <input type="text" name="topic" id="topic" placeholder="Enter topic" required>
        <label for="score">Score: </label>
        <input type="number" name="score" id="score" placeholder="Enter score" required>
        <input type="submit" name="update" value="Update">
    </form>

    <br>

    <!-- Delete form -->
    <form method="POST">
        <h2>Delete Record</h2>
        <label for="id">ID: </label>
        <input type="number" name="id" id="id" placeholder="Enter ID to delete" required>
        <input type="submit" name="delete" value="Delete">
    </form>

    <br>

    <!-- Display computer data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Topic</th>
            <th>Score</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["topic"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
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
