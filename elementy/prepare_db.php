<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Print to console


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$conn->query("CREATE DATABASE lornetki");
$conn->select_db("lornetki");

// Create table
$conn->query("CREATE TABLE lornetki (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title TINYTEXT NULL,
    description TEXT NULL,
    img TEXT NULL,
    price FLOAT NULL
    )");

// Sample data
$data = array(
    array("title" => "Nikon Monarch 5 8x42", "description" => "Wysokiej klasy binokular z wyjątkową jakością obrazu i zaawansowanymi funkcjami.", "img" => "nikon-monarch-5.png", "price" => 299.99),
    array("title" => "Zeiss Conquest HD 10x42", "description" => "Solidny i wszechstronny binokular z oszałamiającą optyką i eleganckim designem.", "img" => "zeiss-conquest-hd.png", "price" => 999.99),
    array("title" => "Vortex Diamondback HD 10x42", "description" => "Przystępny cenowo binokular z imponującą wydajnością i trwałą konstrukcją.", "img" => "vortex-diamondback-hd.png", "price" => 229.99),
    array("title" => "Leupold BX-4 Pro Guide HD 10x42", "description" => "Profesjonalny binokular o doskonałej jakości obrazu i solidnej konstrukcji.", "img" => "leupold-bx-4-pro-guide.png", "price" => 599.99),
    array("title" => "Bushnell Legend Ultra HD 10x42", "description" => "Wysoko wydajny binokular z eleganckim designem i zaawansowaną optyką.", "img" => "bushnell-legend-ultra.png", "price" => 399.99),
    array("title" => "Celestron TrailSeeker ED 10x42", "description" => "Najwyższej klasy binokular z trwałą magnezową obudową i wyjątkową optyką.", "img" => "celestron-trailseeker-ed.png", "price" => 549.99),
    array("title" => "Swarovski Optik EL 10x42", "description" => "Elitarny binokular z kryształowo czystą optyką i lekkim, ergonomicznym designem.", "img" => "swarovski-optik-el.png", "price" => 2599.99),
    array("title" => "Pentax AD 10x42", "description" => "Uniwersalny binokular z trwałą, wodoodporną konstrukcją i wysokiej jakości optyką.", "img" => "pentax-ad.png", "price" => 449.99),
    array("title" => "Nikon Prostaff 3S 10x42", "description" => "Przyjazny dla portfela binokular z imponującą optyką i lekką konstrukcją.", "img" => "nikon-prostaff-3s.png", "price" => 129.99),
    array("title" => "Steiner Predator AF 10x42", "description" => "Wysoko wydajny binokular z zaawansowaną optyką i solidną konstrukcją.", "img" => "steiner-predator-af.png", "price" => 549.99),
    array("title" => "Vanguard Endeavor ED II 10x42", "description" => "Premiumowy binokular z wyjątkową optyką i solidną, wodoodporną konstrukcją.", "img" => "vanguard-endeavor-ed.png", "price" => 549.99),
    array("title" => "Barska Blackhawk 10x42", "description" => "Trwały binokular z zaawansowaną optyką i solidną, wodoodporną konstrukcją.", "img" => "barska-blackhawk.png", "price" => 179.99),
);

// Insert data into table
foreach ($data as $item) {
    $sql = "INSERT INTO lornetki (title, description, img, price) VALUES ('" . $item['title'] . "', '" . $item['description'] . "', '" . $item['img'] . "', " . $item['price'] . ")";
    $conn->query($sql);
}

// We are done
$conn->close();
