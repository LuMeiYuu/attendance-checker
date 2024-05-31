<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from students table
$sql_students = "SELECT * FROM students";
$result_students = $conn->query($sql_students);

$sql_attend_comb = "SELECT * FROM combined_info";
$result_attendance = $conn->query($sql_attend_comb);

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Students</title>
    <link rel="stylesheet"  href="/test/style.css">
</head>
<body >

    <div class="top-bar">
        <ul>
            <li><a href="\test"><button> Register </button></a> </li>
            <li><span><img src="\test\images\logomain.png" alt="logo goes here"></span></li>
            <li><a href="\test\display" ><button> Records </button></a> </li>
    </ul>
    </div>

<div class="maindiv">
    <div class="info-card">
        <h2 style="margin:5px;" >Students Table</h2>
        <a style="margin:5px;" href="download_students.php" download><button>Download CSV</button></a>
        
        

<table border="1">
    <tr >
        <th>Name</th>
        <th>ID Number</th>
    </tr>
    <?php
    if ($result_students->num_rows > 0) {
        while($row_students = $result_students->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_students["name"] . "</td>";
            echo "<td>" . $row_students["id_number"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No students found</td></tr>";
    }
    ?>
</table>
   </div>
    
   <div class="info-card">
        <h2 style="margin:5px;">Attendance Table</h2>
        <a href="download_attendance.php" download><button>Download CSV</button></a>
        

<table border="1">
    <tr>
        <th>Name</th>
        <th>Time</th>
        <th>Date</th>
    </tr>
    <?php
    if ($result_attendance->num_rows > 0) {
        while($row_attendance = $result_attendance->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_attendance["name"] . "</td>";
            
        // Format the time column to display in AM/PM format
        echo "<td>" . date("h:i A", strtotime($row_attendance["time"])) . "</td>";
        echo "<td>" . date("M d, Y", strtotime($row_attendance["time"])) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No students found</td></tr>";
    }
    ?>
</table>
   </div>

</div>
</body>
 
    
    
</html>
