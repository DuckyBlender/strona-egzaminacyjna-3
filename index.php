<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ducky-Zoom &middot; Strona Główna</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='main.js'></script>
</head>

<body class="bg-gray-800 text-gray-100">
    <!-- Header -->
    <?php include_once('./elementy/header.php') ?>

    <!-- Main content -->
    <div class=" my-8">
        <div class="flex justify-center">
            <h1 class="text-4xl font-bold text-center">
                Ducky-Zoom &middot; Lornetki
            </h1>
        </div>


        <div class="flex flex-wrap p-16">
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
                    // Max size of the image is 300x300px, to fix aspect ratio, we need to set max-height to 300px and max-width to 300px
                    echo "<div class='w-1/3 p-4'>
                        <div class='bg-gray-900 rounded-lg p-4'>
                            <img src='./img/" . $row['img'] . "' class='w-full rounded-lg mb-4 shadow-lg'>
                            <h2 class='text-2xl font-bold mb-2'>" . $row['title'] . "</h2>
                            <p class='mb-4'>" . $row['description'] . "</p>
                            <p class='text-xl font-bold'>Cena: " . $row['price'] . " zł</p>
                        </div>
                    </div>";
                }
            } else {
                echo "Brak danych";
            }





            ?>

        </div>
    </div>


    <!-- Footer -->
    <?php include_once('./elementy/stopka.php') ?>
</body>

</html>