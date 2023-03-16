<!-- Website that shows a confirmation for the order from the URL -->

<?php
// Get the data from the URL
// Example URL: http://localhost/rachunek.php?lornetka=7&lornetka=8&lornetka=12
$lornetki = $_GET['lornetka'];
if ($lornetki == null) {
    // Redirect to the main page if there are no IDs
    header("Location: /");
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Select the database
$conn->select_db("lornetki");

$suma = 0;

echo "<h1>Dziekujemy za zakup</h1>";
echo "<h3>Twoje zamówienie:</h3>";
// Select data, looping through the array of IDs
foreach ($lornetki as $lornetka) {
    $result = $conn->query("SELECT * FROM lornetki WHERE id = $lornetka");
    $row = $result->fetch_assoc();

    // Display data
    // Print out the price brutto and netto

    $suma += $row['price'];
    echo "<hr>";
    echo "<p><b>" . $row['title'] . " - " . $row['price'] . " zł</b></p>";
    echo "<p>Netto: " . round($row['price'] / 1.23, 2) . " zł</p>";
    echo "<p>VAT: " . round($row['price'] / 1.23 * 0.23, 2) . " zł</p>";
}
echo "<hr>";
echo "<p><b>Suma: " . $suma . " zł</b></p>";
echo "<p>Netto: " . round($suma / 1.23, 2) . " zł</p>";
echo "<p>VAT: " . round($suma / 1.23 * 0.23, 2) . " zł</p>";
echo "<br>";
echo "<h3>Zapraszamy ponownie!</h3>";
echo "<br>";

echo "<p><a href='javascript:window.print()'>Kliknij aby wydrukować</a></p>";
echo "<p><a href='/'>Powrót do strony głównej</a></p>"


?>