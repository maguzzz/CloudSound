<?php

include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/addSong.css">
    <title>Cloudsound</title>
</head>

<body>
    <?php
    Flight::route('/', function () {

    });

    Flight::start();
    ?>


    <form id="container" action="/Cloudsound" method="post">
        
        <input id="songImageUploader" type="file" accept="image/*"> 
        <div id="imagerAndImageUploader">
            <div id="songImage">

            </div>
            <div id="imageUploaderContainer">

                <label id="labelForUploaderImage" for="songImageUploader">Upload File</label>
            </div>

        </div>
        

        <div id="nameAndDescription">
            <input type="text" id="songName" placeholder="Name"><br>
            <input type="text" id="songDescription" placeholder="Description"><br>
            <input type="submit" id="songUpload" value="Upload">
        </div>
    </form>



</body>

</html>