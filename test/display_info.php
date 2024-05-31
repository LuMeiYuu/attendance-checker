<html>
<head>
</head>
<body>
<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the most recently submitted row from the students table
$sql = "SELECT * FROM students ORDER BY student_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    // Fetch the most recently inserted row data
    $row = $result->fetch_assoc();

    // Display the inserted data
    echo "Submitted information:<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Id Number: " . $row['id_number'] . "<br>";
} else {
    echo "Error: No data found.";
}

// Close database connection
$conn->close();
?>
</body>
</html>
