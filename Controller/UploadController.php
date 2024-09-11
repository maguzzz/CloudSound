<?php

//require './library/redbean/rb.php';

class UploadController {

    public function index() {
        Flight::render('upload');
    }

    public function upload() {

        $parentDir = 'Songs';
        $newFolderName = 'Song ID';//Flight::request()->data->songName; //. '___' . Flight::request()->data->artist;
        
        $songId = DBsubmitSong('', '', 'songName', 'Description', 'Genre', 'Artist', 'Features', 'Producer');
        
        echo ($songId);

        /*
        $newDirPath = $parentDir . '/' . $newFolderName;

        if (!is_dir($newDirPath)) {

            if (mkdir($newDirPath, 0777, true)) {
                echo 'Ordner erfolgreich erstellt: ' . $newDirPath;
            } else {
                echo 'Fehler beim Erstellen des Ordners.';
            }

        } else {
            echo 'Ordner existiert bereits: ' . $newDirPath;
        }
        */

        //print_r($_POST);
        //print_r(Flight::request()->data);

    }

}