<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lornetki</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='main.js'></script>
</head>

<body>
    <!-- Main header, dark mode, minimalistic -->
    <!-- Using tailwind css -->
    <div class="bg-gray-900 py-4">
        <div class="mx-auto container flex justify-between items-center">
            <h1 class="text-gray-100 text-3xl font-bold">Logo</h1>
            <nav>
                <ul class="flex items-center">
                    <li class="mx-4"><a href="#" class="text-gray-100 font-medium hover:text-gray-300">Home</a></li>
                    <li class="mx-4"><a href="#" class="text-gray-100 font-medium hover:text-gray-300">Services</a></li>
                    <li class="mx-4"><a href="#" class="text-gray-100 font-medium hover:text-gray-300">About</a></li>
                    <li class="mx-4"><a href="#" class="text-gray-100 font-medium hover:text-gray-300">Contact</a></li>
                </ul>
            </nav>
            <button class="bg-gray-800 text-gray-100 px-4 py-2 rounded-full outline-none focus:outline-none">
                Dark
            </button>
        </div>
    </div>

    <!-- Main content -->
    <div class="container mx-auto my-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to our website</h1>
            <p class="text-lg">We are thrilled to have you here. Our website offers a wide range of products and
                services to meet your needs. Whether you're looking for fashion, food or travel, you'll find it all
                here. Browse through our website to explore and discover what we have to offer. Thank you for choosing
                us!</p>
        </div>
    </div>

    <!-- Footer -->
    



    <?php
    // Connect to the mysql xampp database
    $servername = "localhost";

    // default xampp username and password
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $conn->query("CREATE DATABASE IF NOT EXISTS lornetki");

    // Select database
    $conn->select_db("lornetki");

    // Create table
    $conn->query("CREATE TABLE IF NOT EXISTS lornetki (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, price INT(6) NOT NULL, description VARCHAR(100) NOT NULL, image VARCHAR(100) NOT NULL)");

    // Insert data
    $conn->query("INSERT INTO lornetki (name, price, description, image) VALUES ('Lornetka 1', 100, 'Opis lornetki 1', 'lornetka1.jpg')");

    // Select data
    $result = $conn->query("SELECT * FROM lornetki");

    ?>
</body>

</html>