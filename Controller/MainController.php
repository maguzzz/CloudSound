<?php
require_once './Database/connectionDB.php';

//require './library/redbean/rb.php';

class MainController {

    public function index($searchSong = null) {
        session_start();
        Flight::view()->set('songs', DBGetSongs($searchSong));    

                    
        $sessionId = $_SESSION['id'] ?? null;
        Flight::view()->set('sessionID', $sessionId);

        Flight::render('main');
    }

    public function search() {

        $this->index(Flight::request()->data->searchField);

    }    



    public function createUser() {
        session_start();
        echo'NMGGa';
        if(Flight::request()->data->registerPassword == Flight::request()->data->registerConfirmPassword && isset(Flight::request()->data->registerName)){
            DBcreateUser(Flight::request()->data->registerName, Flight::request()->data->registerEmail, Flight::request()->data->registerPassword);
        } else {
            Flight::redirect("/");
        }
    }

    public function setSession() {
        session_start();

        $loginEmail = Flight::request()->data->loginEmail ?? null;
        $loginPassword = Flight::request()->data->loginPassword ?? null;
    
        if ($loginEmail && $loginPassword) {
            $userId = DbFindUserId($loginEmail, $loginPassword);

            if ($userId) {
                $_SESSION['id'] = $userId['id'];
                $_SESSION['name'] = $userId['name'];
            } else {
                // Login Fail
                $_SESSION['id'] =  "ERROR 1";
            }
        } else {
            // No Input
            $_SESSION['id'] =  "ERROR 2";
        }
        Flight::redirect("/");
    }
    

    public function logout() {
        session_start();
        $_SESSION = array();

        session_destroy(); 
        Flight::redirect('/');
    }

}