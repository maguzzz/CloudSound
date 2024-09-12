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
                    <div id="labelForUploaderImage"> Upload Album Cover </div>
                </label> <input id="songImageUploader" name="songImageUploader" type="file" accept="image/*"> </div>
        </div>
        </div>
        <div id="nameAndDescription">
            <div id="songNameContainer">
                <input type="text" id="songName" name="songName" placeholder="Name"> <br>
            </div>
            <div id="songDescriptionContainer">
                <textarea  type="text" id="songDescription" name="songDescription" placeholder="Description"></textarea>
            </div>
            <div id="tagContainer">
                <select name="genre" id="tag">
                    <option value="R&B">R&B</option>
                    <option value="Trap">Trap</option>
                    <option value="Rock">Rock</option>
                    <option value="Pop">Pop</option>
                    <option value="Drill">Drill</option>
                </select>

                <select name="artist" id="tag">
                    <?php foreach(getUser() as $user): ?>
                        <option value="<?php $user['id'] ?>" <?= ($user['id'] == $_SESSION['id']) ? 'selected' : '' ?>><?= $user['user_name'] ?></option>
                    <?php endforeach; ?>
                <!--<option value="J. Cole">J. Cole</option>
                    <option value="J.I.D">J.I.D</option>
                    <option value="Drake">Drake</option>
                    <option value="Travis Scott">Travis Scott</option>-->
                </select>

                <select name="feature" id="tag">
                    <option value=null></option>
                    <?php foreach(getUser() as $user): ?>
                        <option value="<?php $user['id'] ?>"><?= $user['user_name'] ?></option>
                    <?php endforeach; ?>
                <!--<option value="21 Savage">21 Savage</option>
                    <option value="Eminem">Eminem</option>
                    <option value="Juice Wrld">Juice Wrld</option>
                    <option value="Young Thug">Young Thug</option>
                    <option value="Timbaland">Timbaland</option>-->
                </select>

                <select id="tag" name="producer">
                    <option value=null></option>
                    <?php foreach(getUser() as $user): ?>
                        <option value="<?php $user['id'] ?>"><?= $user['user_name'] ?></option>
                    <?php endforeach; ?>
                <!--<option value="OZ">OZ</option>
                    <option value="Vinylz">Vinylz</option>
                    <option value="Wondagurl">Wondagurl</option>
                    <option value="Cubeatz">Cubeatz</option>
                    <option value="Dj Dahi">Dj Dahi</option>
                    <option value="Kenny Beats">Kenny Beats</option>
                    <option value="Boi 1da">Boi 1da</option>
                    <option value="Jahaan Sweet">Jahaan Sweet</option>
                    <option value="T-Minus">T-Minus</option>-->
                </select>

            </div> 

            <input id="songAudio" name="songAudio" type="file" accept="audio/wav, audio/mpeg" placeholder="Audio">
            <label id="uploadContainer" for="songAudio"></label>

            <input type="submit" id="songUpload" value="Upload">

        </div>
    </form>

</body>

</html>