<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alan-Zoom &middot; Strona Główna</title>
    <!-- Set the favicon -->
    <link rel='icon' href='./img/logo.svg' type='image/x-icon' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800 text-gray-100">
    <!-- Header -->
    <?php include_once('./elementy/header.php') ?>

    <!-- Main content -->
    <div class="my-8">
        <div class="flex justify-center">
            <h1 class="text-4xl font-bold text-center">
                Alan-Zoom &middot; Admin
            </h1>
        </div>
        <!-- Powinna być zakładka dla administratora do której będzie się wchodziło przez hasło a hasło to będzie 'klas'. Powinny być widoczne wsyzstkie rekordy bazy danych. -->


        <?php
        // Check if the request has the password in the body
        if (!isset($_POST['password'])) {
            // Show the password form
            echo "<div class='flex flex-col justify-center items-center'>";
            echo "<p>Podaj hasło:</p>";
            echo "<form method='post'>";
            echo "<input type='password' name='password' class='bg-gray-900 text-gray-200 rounded-lg p-4 m-4' placeholder='Hasło'>";
            echo "<input type='submit' value='Zaloguj' class='bg-gray-900 text-gray-200 rounded-lg p-4 m-4'>";
            echo "</form>";
            echo "</div>";
            return;
        }


        // We have the password, check if it is correct
        $password = $_POST['password'];
        if ($password != 'klas') {
            echo "<div class='flex flex-col justify-center items-center'>";
            echo "<p>Niepoprawne hasło</p>";
            echo "<form method='post'>";
            echo "<input type='password' name='password' class='bg-gray-900 text-gray-200 rounded-lg p-4 m-4' placeholder='Hasło'>";
            echo "<input type='submit' value='Zaloguj' class='bg-gray-900 text-gray-200 rounded-lg p-4 m-4'>";
            echo "</form>";
            echo "</div>";
            return;
        }
        // The password is correct, show the database
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

        // Select data
        $result = $conn->query("SELECT * FROM lornetki");

        // Show the database structure
        // The result should look like this
        // ---
        // id | int
        // title | varchar
        // description | varchar
        // img | varchar
        // price | float
        // ---


        $columns = $conn->query("SHOW COLUMNS FROM lornetki");
        echo "<div class='p-8'>";
        echo "<h2 class='text-center'>Struktura</h3>";
        echo "<div class='flex justify-center'>";
        echo "<table class='table-auto'>";
        echo "<tr>";
        echo "<th class='px-4 py-2'>Nazwa</th>";
        echo "<th class='px-4 py-2'>Typ</th>";
        echo "</tr>";
        while ($row = $columns->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='border px-4 py-2'>" . $row['Field'] . "</td>";
            echo "<td class='border px-4 py-2'>" . $row['Type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";






        // Display data
        echo "<div class='p-8'>";
        echo "<h2 class='text-center'>Wszystkie rekordy</h3>";
        echo "<div class='flex justify-center'>";
        echo "<table class='table-auto'>";
        echo "<tr>";
        echo "<th class='px-4 py-2'>ID</th>";
        echo "<th class='px-4 py-2'>Nazwa</th>";
        echo "<th class='px-4 py-2'>Opis</th>";
        echo "<th class='px-4 py-2'>Obraz</th>";
        echo "<th class='px-4 py-2'>Cena</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='border px-4 py-2'>" . $row['id'] . "</td>";
            echo "<td class='border px-4 py-2'>" . $row['title'] . "</td>";
            echo "<td class='border px-4 py-2'>" . $row['description'] . "</td>";
            echo "<td class='border px-4 py-2'>" . $row['img'] . "</td>";
            echo "<td class='border px-4 py-2'>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";





        ?>
    </div>
</body>