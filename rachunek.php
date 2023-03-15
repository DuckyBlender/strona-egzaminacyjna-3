<!-- Website that shows a confirmation for the order from the URL -->

<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the URL
// Example URL: http://localhost/rachunek.php?lornetka=7&lornetka=8&lornetka=12
$lornetki = $_GET['lornetka'];
echo $lornetki;

?>