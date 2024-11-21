<?php
$host = 'localhost'; // Database host
$db = 'todo_list'; // Database name
$user = 'root'; // Database user
$pass = ''; // Database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
