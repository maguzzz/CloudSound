<?php
require_once './Database/connectionDB.php';

//require './library/redbean/rb.php';

class MainController {

    public function index() {
        Flight::render('main');
    }

    public function createUser() {

        session_start();

        if(isset(Flight::request()->data->loginEmail)){
            
            loginUser(Flight::request()->data->loginEmail, Flight::request()->data->loginPassword);
            
        }

        if(Flight::request()->data->password == Flight::request()->data->confirmPassword) {
            DBcreateUser(Flight::request()->data->registerName, Flight::request()->data->registerEmail, Flight::request()->data->password);
        } else {
            Flight::redirect("/");
        }
       

        

    }

}