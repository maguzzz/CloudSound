<?php
//include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';

//Controller
require 'Controller/UploadController.php';
$uploadController = new UploadController();

require 'Controller/MainController.php';
$mainController = new MainController();

Flight::route('GET  /', array($mainController, 'index'));
Flight::route('POST /', array($mainController, 'search'));

Flight::route('POST /register', array($mainController,'createUser'));

Flight::route('POST /login', array($mainController,'setSession'));
Flight::route('POST /logout', array($mainController,'logout'));

Flight::route('GET  /upload', array($uploadController, 'index'));
Flight::route('POST /upload', array($uploadController, 'upload'));;

Flight::start();
