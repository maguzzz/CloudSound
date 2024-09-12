<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    <title>Document</title>
</head>

<body>

    <form id="registerForm" action="/CloudSound/" method="post" enctype="multipart/form-data">

        <input type="text" name="registerName" placeholder="Name" required>
        <input type="text" name="registerEmail" placeholder="Email" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="text" name="confirmPassword" placeholder="Confirm Password" required>
        <input type="submit" value="register">

    </form></br></br></br></br>


    <form id="loginForm" action="/CloudSound/" method="post" enctype="multipart/form-data">
        <input type="text" name="loginEmail" placeholder="Email" required>
        <input type="text" name="loginPassword" placeholder="Password" required>
        <input type="submit" value="login">    
    </form>


    <div id="MusicPlayerContainer">
        <div id="playerBorder">
            <div id="playerAlbumCover"> </div>
            <div id="titleAndSoContainer">
                <div id="titleAndDate">
                    <div id="titleAndArtist">
                        <div id="songTitle">AAAAAAAAAAAAAAA</div>
                        <div id="songArtist">by Ken Carson</div>
                    </div>
                    <div id="dateContainer">20.07.2018</div>
                </div>
                <div id="tagAndPlayerContainer">
                    <div id="tags">
                        <div id="tag">R&B</div>
                        <div id="tag">Trap</div>
                        <div id="tag"></div>
                        <div id="tag"></div>
                    </div>
                    <div id="playerContainer">
                        <audio id="player" controls>
                            <source src="Songs/Song/song1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>

            </div>
        </div>
        <div id="playerBorder">
            <div id="playerAlbumCover"> </div>
            <div id="titleAndSoContainer">
                <div id="titleAndDate">
                    <div id="titleAndArtist">
                        <div id="songTitle">AAAAAAAAAAAAAAA</div>
                        <div id="songArtist">by Ken Carson</div>
                    </div>
                    <div id="dateContainer">20.07.2018</div>
                </div>
                <div id="tagAndPlayerContainer">
                    <div id="tags">
                        <div id="tag">R&B</div>
                        <div id="tag">Trap</div>
                        <div id="tag"></div>
                        <div id="tag"></div>
                    </div>
                    <div id="playerContainer">
                        <audio id="player" controls>
                            <source src="Songs/Song/song1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>

            </div>
        </div>
        <div id="playerBorder">
            <div id="playerAlbumCover"> </div>
            <div id="titleAndSoContainer">
                <div id="titleAndDate">
                    <div id="titleAndArtist">
                        <div id="songTitle">AAAAAAAAAAAAAAA</div>
                        <div id="songArtist">by Ken Carson</div>
                    </div>
                    <div id="dateContainer">20.07.2018</div>
                </div>
                <div id="tagAndPlayerContainer">
                    <div id="tags">
                        <div id="tag">R&B</div>
                        <div id="tag">Trap</div>
                        <div id="tag"></div>
                        <div id="tag"></div>
                    </div>
                    <div id="playerContainer">
                        <audio id="player" controls>
                            <source src="Songs/Song/song1.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>