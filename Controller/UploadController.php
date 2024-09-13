<?php

use RedBeanPHP\Util\Dump;

require './Database/connectionDB.php';

//require './library/redbean/rb.php';

class UploadController
{

    public function index()
    {
        session_start();

        /*if (isset($_SESSION['id'])) {
            echo "ID: " . $_SESSION['id'];
        }*/
        if (!isset($_SESSION['id'])) {
            Flight::redirect('/');
        }

        Flight::render('upload');
    }

    public function upload()
    {
        session_start();

        $songName = Flight::request()->data->songName;
        $songDescription = Flight::request()->data->songDescription;
        $songGenre = Flight::request()->data->genre;
        $songArtist = Flight::request()->data->artist;
        $songFeature = Flight::request()->data->feature;
        $songProducer = Flight::request()->data->producer;

        $songId = DBsubmitSong($_SESSION['id'], $songName, $songDescription, $songGenre, $songArtist, $songFeature, $songProducer);

        //Ordner erstellen
        $dirPath = 'Songs/' . $songId;
        if (!is_dir($dirPath)) {

            if (mkdir($dirPath, 0777, true)) {
                echo 'Ordner erfolgreich erstellt: ' . $dirPath;
            } else {
                echo 'Fehler beim Erstellen des Ordners.';
            }

        } else {
            echo 'Ordner existiert bereits: ' . $dirPath;
        }

        //Cover speichern
        $coverFileTmpPath = $_FILES['songImageUploader']['tmp_name'];
        $coverFileName = $_FILES['songImageUploader']['name'];

        $coverDestPath = './Songs/' . $songId . '/' . $coverFileName;

        if (move_uploaded_file($coverFileTmpPath, $coverDestPath)) {
            echo 'Bild erfolgreich hochgeladen! Pfad: ' . $coverDestPath;
        } else {
            echo 'Fehler beim Hochladen des Bildes.';
        }


        //Song hochladen
        $audioFileTmpPath = $_FILES['songAudio']['tmp_name'];
        $audioFileName = $_FILES['songAudio']['name'];

        $audioDestPath = './Songs/' . $songId . '/' . $audioFileName;

        if (move_uploaded_file($audioFileTmpPath, $audioDestPath)) {
            echo 'Audiodatei erfolgreich hochgeladen! Pfad: ' . $audioDestPath;
        } else {
            echo 'Fehler beim Hochladen der Audiodatei.';
        }

        DBreassignSongSource($songId, $coverDestPath, $audioDestPath);

        //DBGetSongs();

        Flight::redirect('/');
    }

}