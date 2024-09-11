<?php

use RedBeanPHP\Util\Dump;

require './Database/connectionDB.php';

//require './library/redbean/rb.php';

class UploadController {

    public function index() {
        Flight::render('upload');
    }
    
    public function upload() {

        $songName = Flight::request()->data->songName;
        $songDescription = Flight::request()->data->songDescription;
        $songGenre = Flight::request()->data->genre;
        $songArtist = Flight::request()->data->artist;
        $songFeature = Flight::request()->data->feature;
        $songProducer = Flight::request()->data->producer;

        $songId = DBsubmitSong('creatorID', $songName, $songDescription, $songGenre, $songArtist, $songFeature, $songProducer);

        $dirPath = 'Songs/' . $songId;

        //Ordner erstellen
        if (!is_dir($dirPath)) {

            if (mkdir($dirPath, 0777, true)) {
                echo 'Ordner erfolgreich erstellt: ' . $dirPath;
            } else {
                echo 'Fehler beim Erstellen des Ordners.';
            }

        } else {
            echo 'Ordner existiert bereits: ' . $dirPath;
        }

        $fileTmpPath = $_FILES['songImageUploader']['tmp_name'];
        $fileName = $_FILES['songImageUploader']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
 
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $dest_path = './Songs/' . $songId . '/' . $fileName;

            // Verschiebe die hochgeladene Datei in das Zielverzeichnis
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'Bild erfolgreich hochgeladen! Pfad: ' . $dest_path;
            } else {
                echo 'Fehler beim Hochladen des Bildes.';
            }
        } else {
            echo 'Ungültiger Dateityp. Erlaubt sind nur: ' . implode(', ', $allowedfileExtensions);
        }

        DBreassignSongSource($songId, 'Image Path', 'Audio Path');

        DBGetSongs();

    }

}