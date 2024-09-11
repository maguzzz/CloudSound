<?php

//require './library/redbean/rb.php';

class UploadController {

    public function index() {
        Flight::render('upload');
    }

    public function upload() {

         //print_r($_POST);
         print_r(Flight::request()->data->songUpload);

    }

}