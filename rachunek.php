<?php
// Get the data from the form data
$lornetki = $_POST;

// Remove the empty elements from the array
$lornetki = array_filter($lornetki);

// Check if the array is empty
if (empty($lornetki)) {
    // Redirect to the main page
    header("Location: /");
    return;
}

include_once("./elementy/conn_db.php");

// Select the database
$conn->select_db("lornetki");

$allPrice = 0;

echo "<h1>Dziekujemy za zakup</h1>";
echo "<h3>Twoje zamówienie:</h3>";
// Select data, looping through the array of IDs
foreach ($lornetki as $lornetka => $amount) {
    // Get the item data from the database
    $result = $conn->query("SELECT * FROM lornetki WHERE id = $lornetka");
    $row = $result->fetch_assoc();

    // Update the "bought" column in the database with the new amount
    $newAmount = $row['bought'] + $amount;
    $conn->query("UPDATE lornetki SET bought = $newAmount WHERE id = $lornetka");

    // Calculate the item's total price based on the quantity purchased
    $totalPrice = $row['price'] * $amount;

    // Add the item's total price to the order subtotal
    $allPrice += $totalPrice;

    // Display the item data and total price
    echo "<hr>";
    echo "<p><b>" . $row['title'] . " - " . $row['price'] . " zł x " . $amount . "</b></p>";
    echo "<p>Netto: " . round($totalPrice / 1.23, 2) . " zł</p>";
    echo "<p>VAT: " . round($totalPrice / 1.23 * 0.23, 2) . " zł</p>";
}
echo "<hr>";

// Display the order subtotal and total tax
echo "<p><b>Suma: " . $allPrice . " zł</b></p>";
echo "<p>Netto: " . round($allPrice / 1.23, 2) . " zł</p>";
echo "<p>VAT: " . round($allPrice / 1.23 * 0.23, 2) . " zł</p>";
echo "<br>";
echo "<h3>Zapraszamy ponownie!</h3>";
echo "<br>";

// Add print and homepage links
echo "<p><a href='javascript:window.print()'>Kliknij aby wydrukować</a></p>";
echo "<p><a href='/'>Powrót do strony głównej</a></p>";
