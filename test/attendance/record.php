<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're getting the student ID from a form
$id_number = $_POST['id_number'];

// Prepare SQL statement to insert ID number into the "attendance" table
$sql = "INSERT INTO attendance (id_number) VALUES ('$id_number')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    // Success: Redirect back to the original page
    echo "<script>alert('Attendance recorded successfully for student');</script>";
    echo "<script>window.location.href = '/attendance-checker/test/attendance';</script>";
    exit(); // Ensure that no further code is executed after the redirect

} else {
    // Error: Display the error message
    echo "Error: " . $conn->error;
}

// Close database connection
$conn->close();
?>
