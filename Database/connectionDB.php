<?php

    include './library/redbean/rb.php';
    R::setup( 'mysql:host=localhost;dbname=cloudsound',
        'root', '' );

    $isConn = R::testConnection();
    if(!$isConn) {
       print "connectino failed" ;
    }
?>
