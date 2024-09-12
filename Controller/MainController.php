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

        if(isset(Flight::request()->data->loginEmail)){
            
            DbFindUser(Flight::request()->data->loginEmail, Flight::request()->data->loginPassword);
            
        }

        if(Flight::request()->data->registerPassword == Flight::request()->data->registerConfirmPassword && isset(Flight::request()->data->registerName)){
            DBcreateUser(Flight::request()->data->registerName, Flight::request()->data->registerEmail, Flight::request()->data->registerPassword);
        } else {
            Flight::redirect("/");
        }
       

        

    }

}