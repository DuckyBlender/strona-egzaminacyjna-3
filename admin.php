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
            echo "<input type='password' name='password' class='bg-gray-900 text-gray-200 rounded-lg p-4 ' placeholder='Hasło'>";
            echo "<input type='submit' value='Zaloguj' class='bg-gray-900 text-gray-200 rounded-lg p-4'>";
            echo "</form>";
            echo "</div>";
            return;
        }


        // We have the password, check if it is correct
        $password = $_POST['password'];
        if ($password != 'klas') {
            echo "<p>Niepoprawne hasło.</p>";
            echo "<form method='post'>";
            echo "<input type='password' name='password' class='bg-gray-900 text-gray-100 border-2 border-gray-900 rounded-lg p-4' placeholder='Hasło'>";
            echo "<input type='submit' value='Zaloguj' class='bg-gray-900 text-gray-100 border-2 border-gray-900 rounded-lg p-4'>";
            echo "</form>";
            return;
        }
        // The password is correct, show the admin panel
        echo "<p>Witaj w panelu administratora.</p>";


        ?>
    </div>
</body>