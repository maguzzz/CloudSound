<?php

    include './RedBean/rb.php';
    R::setup( 'mysql:host=localhost;dbname=cloudsound',
        'root', '' ); //for both mysql or mariaDB

    $isConn = R::testConnection();
    if(!$isConn) {
       print "connectino failed" ;
    }
?>
