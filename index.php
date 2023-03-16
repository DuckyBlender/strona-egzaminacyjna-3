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
    <script src='main.js'></script>
</head>

<body class="bg-gray-800 text-gray-100">
    <!-- Header -->
    <?php include_once('./elementy/header.php') ?>

    <!-- Main content -->
    <div class="my-8">
        <div class="flex justify-center">
            <h1 class="text-4xl font-bold text-center">
                Alan-Zoom &middot; Lornetki
            </h1>
        </div>


        <div class="flex flex-wrap p-16">
            <form method="get" action="rachunek.php" class="w-full">
                <div class="flex flex-wrap -mx-4">
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

                    // Check if database exists. If not, create it using the script
                    $result = $conn->query("SHOW DATABASES LIKE 'lornetki'");
                    if ($result->num_rows == 0) {
                        include_once('./elementy/prepare_db.php');
                    }

                    // Select database
                    $conn->select_db("lornetki");

                    // Select data
                    $result = $conn->query("SELECT * FROM lornetki");

                    // Display data. Use flexbox to display it in a grid
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='p-4 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5'>
                            <div class='bg-gray-900 rounded-lg p-4 h-full flex flex-col'>
                                <img src='./img/" . $row['img'] . "' class='w-full rounded-lg mb-4 shadow-lg' loading='lazy'>
                                <h2 class='text-2xl font-bold mb-2'>" . $row['title'] . "</h2>
                                <p class='mb-4'>" . $row['description'] . "</p>
                                <div class='mt-auto'>
                                    <p class='text-xl font-bold'>Cena: " . $row['price'] . " zł</p>
                                    <input type='checkbox' name='lornetka[]' value='" . $row['id'] . "' class='mr-2'>
                                    <label for='lornetka'>Dodaj do koszyka</label>
                                </div>
                            </div>
                        </div>";
                        }

                        // Buy button at the bottom of the page. It looks for all filled checkboxes and sends them to the rachunek.php file
                        echo "<div class='w-full flex justify-center'>
                        <button type='submit' class='bg-gray-900 text-gray-100 p-4 rounded-lg shadow-lg mt-8'>Kup</button>
                    </div>";
                    } else {
                        echo "Brak danych";
                    }

                    ?>
                </div>
            </form>
        </div>
    </div>


    <!-- Footer -->
    <?php include_once('./elementy/stopka.php') ?>
</body>

</html>