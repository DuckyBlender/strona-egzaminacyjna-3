<?php
// Connect to the database
include_once("./elementy/conn_db.php");

// Delete database lornetki
$conn->query("DROP DATABASE lornetki");

// Create the database
include_once("prepare_db.php");
?>

<script>
    window.location.href = "./admin.php";
</script>