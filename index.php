<?php

include 'Database/connectionDB.php';
require_once 'flight/Flight.php';

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
        print "test";
        Flight::route('/', function () {
            echo 'hello world!';
        });
        
        Flight::start();
    ?>

</body>
</html>