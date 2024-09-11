<?php

//include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';

//Controller
require 'Controller/UploadController.php';
$uploadController = new UploadController();

require 'Controller/MainController.php';
$mainController = new MainController();

Flight::route('GET  /', array($mainController, 'index'));

Flight::route('GET  /upload', array($uploadController, 'index'));
Flight::route('POST /upload', array($uploadController, 'upload'));

<body>
    <?php
        Flight::route('/', function () {
        });

        //DBsubmitSong(1,"ss.png","ss.mp3"," 	SS","NEW SONG BY KEN CARSON","Rap","Ken Carson","McFlurry","Pluto");
        DBGetSongs('s') ;
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
