<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/addSong.css">
    <title>Cloudsound</title>
</head>

<body>

    <div id="actionBar">
        <h1 id="WebsiteTitle"><a href="/CloudSound/">CloudSound</a></h1>
        <form id="searchForm" action="/CloudSound/" method="post" enctype="multipart/form-data">
            <input type="text" name="searchField" placeholder="Search for the newest releases" id="searchbar">
        </form>

        <form action="/CloudSound/logout" method="post">
            <input type="submit" value="Logout" class="custom-button">
        </form>


    </div>


    <form id="container" action="/CloudSound/upload" method="post" enctype="multipart/form-data">
        <div id="imageAndImageUploader">
            <div id="songImage"> </div>
            <div id="imageUploaderContainer"> <label for="songImageUploader">
                    <div id="labelForUploaderImage"> Upload File </div>
                </label> <input id="songImageUploader" name="songImageUploader" type="file" accept="image/*" required>
            </div>
        </div>

        <div id="nameAndDescription">
            <div id="songNameContainer">
                <input type="text" id="songName" name="songName" placeholder="Name" required> <br>
            </div>
            <div id="songDescriptionContainer">
                <textarea type="text" id="songDescription" name="songDescription" placeholder="Description"></textarea>
            </div>


            <div id="tagContainer">
                <select name="genre" id="tag" required>
                    <option value="R&B">R&B</option>
                    <option value="Trap">Trap</option>
                    <option value="Rock">Rock</option>
                    <option value="Pop">Pop</option>
                    <option value="Drill">Drill</option>
                </select>

                <select name="artist" id="tag">
                        <option value="<?= $_SESSION['id'] ?>"><?= getUser($_SESSION['id'])['user_name'] ?></option>
                </select>

                <select name="feature" id="tag">
                    <option value=null></option>
                    <?php foreach(getUser() as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= $user['user_name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select id="tag" name="producer">
                    <option value=null></option>
                    <?php foreach(getUser() as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= $user['user_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div id="songAudioContainer">
                <input id="songAudio" name="songAudio" type="file" accept="audio/wav, audio/mpeg" placeholder="Audio"
                    required>
                <label id="labelForSongAudio" for="songAudio">
                    <div id="mp3Div">
                        Click here to select your song
                    </div>
                </label>
                <br>
                <input type="submit" id="songUpload" value="Upload">
            </div>



        </div>
    </form>

    <script src="./Js/uploadSong.js"></script>

</body>

</html>