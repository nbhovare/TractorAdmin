<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ya_admin";


// $protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
// $img = "http://localhost:8090/tractor/tractorAdmin/img/products/";
// define("BASE_URL", $protocol . "://" . $_SERVER["HTTP_HOST"] . "/Visitor_Office/");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u570162860_ya_admin";

/*$servername = "localhost";
$username = "u570162860_ya_admin";
$password = "Jittu123@456";
$dbname = "u570162860_ya_admin";*/

$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
$img = "https://yashasviagrotech.com/tractorAdmin/img/products/";
// define("BASE_URL", $protocol . "://" . $_SERVER["HTTP_HOST"] . "/Visitor_Office/");


date_default_timezone_set('Asia/Kolkata');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    // Function to convert number to lakh format
    function convertToLakh($number) {
      // Convert to lakh (divide by 100,000)
      $lakh = $number / 100000;
      // Format the number with 2 decimal places
      $formatted_lakh = number_format($lakh, 2);
      return $formatted_lakh . " lakh";
    }

    function convertNumber($number) {
      if ($number >= 100000) {
        // Convert to lakh (divide by 100,000)
        $lakh = $number / 100000;
        // Format the number with 2 decimal places
        $formatted_number = number_format($lakh, 2) . " Lakh";
      } elseif ($number >= 1000) {
        // Convert to thousand (divide by 1,000)
        $thousand = $number / 1000;
        // Format the number with 2 decimal places
        $formatted_number = number_format($thousand, 2) . " Thousand";
      } else {
        // For numbers less than 1000, leave them unchanged
        $formatted_number = $number;
      }
      return $formatted_number;
    }

   

// $conn = mysqli_connect("localhost", "root", "", "jabotravels");
?>