<?php

include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        Flight::route('/', function () {
            echo 'hello world!';
        });
        
        Flight::start();
    ?>

    <form action="/Cloudsound" method="post">
        <input type="text" id="songName"><br>
        <input type="text" id="songDescription"><br>
        <input type="submit" value="Upload">
    </form>

</body>
</html>