<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">

    <title>Document</title>
</head>

<body>




    <div id="PageCont">
        <div id="actionBar">
            <h1 id="WebsiteTitle"><a href="/CloudSound/">CloudSound</a></h1>
            <form id="searchForm" action="/CloudSound/" method="post" enctype="multipart/form-data">
                <input type="text" name="searchField" placeholder="Search for the newest releases" id="searchbar">
            </form>

            <form action="/CloudSound/upload" method="get" id="uploadForm">
                <?php if ($sessionID != 'NO ID FOUND'): ?>
                    <button type="submit">Upload</button>
                <?php elseif ($sessionID): ?>
                    <button type="submit" disabled style="color: #7C7C7C;" title="You have to login first">Upload</button>

                <?php endif; ?>
            </form>


            <div style="display: flex; align-items: center;">
                <?php if ($sessionID != 'NO ID FOUND'): ?>
                    <form action="/CloudSound/logout" method="post">
                        <input type="submit" value="Logout" class="custom-button">
                    </form>
                <?php elseif ($sessionID): ?>
                    <button type="button" id="openLoginDialog" class="custom-button">Login</button>
                <?php endif; ?>
            </div>

        </div>




        <dialog id="RegisterDialog" id>
            <button class="close-btn" id="closeRegisterDialog">
                <img src="./Resources/Icons/X.png" alt="Close" class="close-img">
            </button>
            <form id="registerForm" action="/CloudSound/register" method="post" enctype="multipart/form-data">
                <input type="text" name="registerName" placeholder="Name" required>
                <input type="text" name="registerEmail" placeholder="Email" required>
                <input type="text" name="registerPassword" placeholder="Password" required>
                <input type="text" name="registerConfirmPassword" placeholder="Confirm Password" required>
                <div>
                    <p id="RegLogQ">Already Registered? <a href="#" id="toLogin">Click here to login</a></p>
                    <input type="submit" value="Register">
                </div>
            </form>
        </dialog>

        <dialog id="LoginDialog">
            <button class="close-btn" id="closeLoginDialog">
                <img src="./Resources/Icons/X.png" alt="Close" class="close-img">
            </button>
            <form id="registerForm" action="/CloudSound/login" method="post" enctype="multipart/form-data">
                <input type="text" name="loginEmail" placeholder="Email" required>
                <input type="text" name="loginPassword" placeholder="Password" required>
                <div>
                    <p id="RegLogQ">Don't have an Account? <a href="#" id="toRegister">Click here to Register</a></p>
                    <input type="submit" value="Login">
                </div>
            </form>
        </dialog>

        <div id="MusicPlayerContainer">
            <?php if (isset($songs) && count($songs) > 0): ?>
                <?php foreach ($songs as $song): ?>
                    <div id="playerBorder">
                        <div id="playerAlbumCover"
                            style="background-image: url('<?php echo htmlspecialchars($song['songImage']); ?>');">
                        </div>

                        <div id="titleAndSoContainer">
                            <div id="titleAndDate">
                                <div id="titleAndArtist">
                                    <div id="songTitle"> <?php echo htmlspecialchars($song['songName']); ?></div>
                                    <div id="songArtist"><?php echo htmlspecialchars($song['songDescription']); ?></div>
                                </div>
                                <div id="dateContainer"><?php echo htmlspecialchars($song['songReleaseDate']) ?></div>
                            </div>
                            <div id="tagAndPlayerContainer">
                                <div id="tags">
                                    <div id="tag"><?php echo htmlspecialchars($song['songGenre']); ?></div>
                                    <div id="tag"><?php echo htmlspecialchars(getUser($song['songArtist'])['user_name']); ?></div>                                    
                                    <div id="tag"><?= ($song['songFeatures'] != 'null') ? htmlspecialchars(getUser($song['songFeatures'])['user_name']) : 'NONE'; ?></div>
                                    <div id="tag"><?= ($song['songProducer'] != 'null') ? htmlspecialchars(getUser($song['songProducer'])['user_name']) : 'NONE'; ?></div>
                                    <?php if ($song['song_artist'] == $sessionID): ?>
                                        <form id="delButtonContainer" action="/CloudSound/delete" method="POST">
                                            <input type="hidden" name="songId" value="<?= $song['id'] ?>">
                                            <input id="delButton" type="submit" value="">
                                        </form>
                                    <?php endif;?>
                                </div>
                            <div id="playerContainer">
                                <div id="audioControls">
                                    <div id="seekSliderContainer">
                                        <input type="range" class="seekSlider"  id="seekSlider" value="0">
                                    </div>
                                    <div id="buttonsAndVolume">
                                        <div id="space"></div>
                                        <div id="buttonsBox">
                                            <audio class="audio-player" src="<?php echo $song->songAudio ?>" preload="metadata" loop></audio>
                                            <button class="SecBack" id="SecBack" ></button>
                                            <button class="playIcon" id="playIcon" value="Play"></button>
                                            <button class="SecForward" id="SecForward" ></button>
                                        </div>
                                        <div id="volumeBox">
                                            <input type="range" class="volumeSlider" id="volumeSlider" value="100">     
                                        </div>
                                    </div>

                                    </div>
                                </div>


                            </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No songs available.</p>
        <?php endif; ?>
    </div>

    <script src="./Js/audioplayer.js" ></script>
    <script src="./Js/main.js" ></script>


</body>

</html>