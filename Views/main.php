<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    
    <title>Document</title>
</head>

<body>

    <form id="registerForm" action="/CloudSound/register" method="post" enctype="multipart/form-data">

        <input type="text" name="registerName" placeholder="Name" required>
        <input type="text" name="registerEmail" placeholder="Email" required>
        <input type="text" name="registerPassword" placeholder="Password" required>
        <input type="text" name="registerConfirmPassword" placeholder="Confirm Password" required>
        <input type="submit" value="register">

    </form></br></br></br></br>


    <form id="loginForm" action="/CloudSound/login" method="post" enctype="multipart/form-data">
        <input type="text" name="loginEmail" placeholder="Email" required>
        <input type="text" name="loginPassword" placeholder="Password" required>
        <input type="submit" value="login">
    </form>

    <form action="/CloudSound/upload" method="get">
        <button type="submit">upload</button>
    </form>

    <!--<h1><?php echo htmlspecialchars($sessionID) ?></h1>-->

    <?php if ($sessionID != 'NO ID FOUND'): ?>
        <form action="/CloudSound/logout" method="post">
            <input type="submit" value="logout"></button>
        </form>
    <?php endif; ?>

    <br><br><br><br><br>

    <form id="searchForm" action="/CloudSound/search" method="get" enctype="multipart/form-data">
        <input type="text" name="searchField" placeholder="Search">
        <input type="submit" value="search">
    </form>

    <div id="MusicPlayerContainer">


        <?php if (isset($songs) && count($songs) > 0): ?>
            <?php foreach ($songs as $song): ?>
                <div id="playerBorder">
                    <div id="playerAlbumCover"
                        style="background-image: url('<?php echo htmlspecialchars($song['songImage']); ?>');"></div>

                    <div id="titleAndSoContainer">
                        <div id="titleAndDate">
                            <div id="titleAndArtist">
                                <div id="songTitle"> <?php echo htmlspecialchars($song['songName']); ?></div>
                                <div id="songArtist"><?php echo htmlspecialchars($song['songArtist']); ?></div>
                            </div>
                            <div id="dateContainer"><?php echo htmlspecialchars($song['songReleaseDate']) ?></div>
                        </div>
                        <div id="tagAndPlayerContainer">
                            <div id="tags">
                                <div id="tag"><?php echo htmlspecialchars($song['songGenre']); ?></div>
                                <div id="tag"><?php echo htmlspecialchars($song['songArtist']); ?></div>
                                <div id="tag"><?php echo htmlspecialchars($song['songFeatures']); ?></div>
                                <div id="tag"><?php echo htmlspecialchars($song['songProducer']); ?></div>
                            </div>

                            <div id="playerContainer">
                                <div id="audioControls">
                                    <div id="seekSliderContainer">
                                        <input type="range" class="seekSlider"  id="seekSlider" value="0">
                                    </div>
                                    <div id="buttonsAndVolume">
                                        <audio class="audio-player" src="<?php echo $song->songAudio ?>" preload="metadata" loop></audio>
                                        <button class="SecBack" id="SecBack" ></button>
                                        <button class="playIcon" id="playIcon" value="Play"></button>
                                        <button class="SecForward" id="SecForward" ></button>
                                        <input type="range" class="volumeSlider" id="volumeSlider" value="100">
                                    
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

</body>

</html>
