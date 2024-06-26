<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ya_admin";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u570162860_ya_admin";


/*$servername = "localhost";
$username = "u570162860_ya_admin";
$password = "Jittu123@456";
$dbname = "u570162860_ya_admin";*/

$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
// define("BASE_URL", $protocol . "://" . $_SERVER["HTTP_HOST"] . "/Visitor_Office/");

date_default_timezone_set('Asia/Kolkata');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn = mysqli_connect("localhost", "root", "", "jabotravels");
?>