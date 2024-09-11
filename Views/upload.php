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

    <form id="container" action="/CloudSound/upload" method="post" enctype="multipart/form-data">
        <div id="imageAndImageUploader">
            <div id="songImage"> </div>
            <div id="imageUploaderContainer"> <label for="songImageUploader">
                    <div id="labelForUploaderImage"> Upload File </div>
                </label> <input id="songImageUploader" name="songImageUploader" type="file" accept="image/*"> </div>
        </div>
        </div>
        <div id="nameAndDescription">
            <div id="songNameContainer">
                <input type="text" id="songName" name="songName" placeholder="Name"> <br>
            </div>
            <div id="songDescriptionContainer">
                <input type="text" id="songDescription" name="songDescription" placeholder="Description">
            </div>
            <div id="tagContainer">
                <select name="genre" id="tag">
                    <option value="r_and_b">R&B</option>
                    <option value="jazz">Trap</option>
                    <option value="rock">Rock</option>
                    <option value="pop">Pop</option>
                </select>

                <select name="artist" id="tag">
                    <option value="j_cole">J Cole</option>
                    <option value="jid">J.I.D</option>
                    <option value="drake">Drake</option>
                    <option value="travis_scott">Travis Scott</option>
                </select>

                <select name="feature" id="tag">
                    <option value="21_savage">21 Savage</option>
                    <option value="eminem">Eminem</option>
                    <option value="juice_wrld">Juice Wrld</option>
                    <option value="young_thug">Young Thug</option>
                </select>

                <select name="producer" id="tag">
                    <option value="OZ">OZ</option>
                    <option value="Vinylz">Vinylz</option>
                    <option value="Wondagurl">Wondagurl</option>
                    <option value="Cubeatz">Cubeatz</option>
                </select>

            </div> 

            <input id="songAudio" name="songAudio" type="file" accept="audio/wav" placeholder="Audio">
            <label id="uploadContainer" for="songAudio"></label>

            <input type="submit" id="songUpload" value="Upload">

        </div>
    </form>

</body>

</html>