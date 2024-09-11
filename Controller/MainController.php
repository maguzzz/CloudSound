<?php
require_once './Database/connectionDB.php';

//require './library/redbean/rb.php';

class MainController {

    public function index() {
        Flight::view()->set('songs',  DBGetSongs());
        Flight::render('main');
    }

    public function createUser() {

        session_start();
        DBcreateUser(Flight::request()->data->username, Flight::request()->data->email, Flight::request()->data->password);
        session_destroy();

    }

}