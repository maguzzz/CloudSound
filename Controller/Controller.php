<?php 

require './library/flight/autoload.php';
require './library/redbean/rb.php';
require './livrary/flight/Flight.php';

Flight::route('POST /CloudSound/upload', function() {
    $songName = Flight::request()->data->songName;
    $songDescription = Flight::request()->data->songDescription;
    $songImage = $_FILES['songImage'];

    if ($songImage && $songImage['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($songImage['name']);
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($songImage['tmp_name'], $uploadFile)) {
            echo "Bild erfolgreich hochgeladen.<br>";
        } else {
            echo "Fehler beim Hochladen des Bildes.<br>";
        }
    } else {
        echo "Kein Bild hochgeladen oder Fehler beim Upload.<br>";
        $uploadFile = null;
    }

    DBsubmitSong($uploadFile, "null", $songName, $songDescription, "null", "null", "null", "null");

    Flight::redirect('/CloudSound/');
});

Flight::start();

