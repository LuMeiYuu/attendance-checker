<?php
// Database connection parameters
$host = 'localhost';
$db = 'testing';
$user = "root";
$pass = '';


$dsn = "mysql:host=$host;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Query to get the most recent attendance record along with student details
$sql = "
SELECT id_number, name, time FROM combined_info ORDER BY time DESC LIMIT 1;
";

$stmt = $pdo->query($sql);
$recentEntry = $stmt->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Form to SQL</title>
    <link rel="stylesheet"  href="/test/style.css">
    
</head>
<body> 
<div class="top-bar">
    <ul>
    <li><a href="\test\attendance"><button> Record Attendance </button></a> </li>
    <li><span><img src="\test\images\logomain.png" alt="logo goes here"></span></li>
    <li><a href="/test/display" ><button> Records </button></a> </li>
</ul>
</div>
<div class="card">
<?php
if ($recentEntry) {
    echo "<h2>Most Recent Attendance Record</h2>";
    echo "<p>ID Number: " . htmlspecialchars($recentEntry['id_number']) . "</p>";
    echo "<p>Name: " . htmlspecialchars($recentEntry['name']) . "</p>";
    echo "<p>Time: " . htmlspecialchars($recentEntry['time']) . "</p>";
} else {
    echo "<p>No attendance records found.</p>";
}
?>
</div>




</body>
</html>
