<?php

/*
include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';
*/

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

    <form id="container" action="/CloudSound/upload" method="post">
        <div id="imageAndImageUploader">
            <div id="songImage"> </div>
            <div id="imageUploaderContainer"> <label for="songImageUploader">
                    <div id="labelForUploaderImage"> Upload File </div>
                </label> <input id="songImageUploader" type="file" accept="image/*"> </div>
        </div>
        </div>
        <div id="nameAndDescription">
            <div id="songNameContainer"> <input type="text" id="songName" placeholder="Name"><br> </div>
            <div id="songDescriptionContainer"> <input type="text" id="songDescription" placeholder="Description">
            </div>
            <div id="tagContainer">
                <div id="tag">R&B</div>
                <div id="tag">Jazz</div>
                <div id="tag">Rock</div>
                <div id="tag">Pop</div>
            </div> <input type="submit" id="songUpload" value="Upload">
        </div>
    </form>

</body>

</html>