<!-- Server Connection -->
<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "crud_db";

$conn = mysqli_connect($server_name, $username, $password, $db_name);

if (!$conn) {
    die("connection failed " . mysqli_connect_error());
}
// echo "Connected Successfully!";
