<?php

//include 'Database/connectionDB.php';
require_once 'library/flight/Flight.php';

//Controller
require 'Controller/UploadController.php';
$uploadController = new UploadController();

require 'Controller/MainController.php';
$mainController = new MainController();

Flight::route('GET  /', array($mainController, 'index'));

Flight::route('GET  /upload', array($uploadController, 'index'));
Flight::route('POST /upload', array($uploadController, 'upload'));

Flight::start();