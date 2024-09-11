<?php

//require './library/redbean/rb.php';

class MainController {

    public function index() {
        Flight::render('main');
    }

    public function upload() {

         //print_r($_POST);
         print_r(Flight::request()->data->songUpload);

    }

}