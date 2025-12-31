<?php  

$servername = "localhost";
$usersname = "root";      // database username
$password = "";          // database password
$dbname = "work"; // database name

$conn = new mysqli($servername, $usersname, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


?>