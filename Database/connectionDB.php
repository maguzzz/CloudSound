<?php
include './library/redbean/rb.php';

R::setup(
    'mysql:host=localhost;dbname=cloudsound',
    'root',
    ''
);

$isConn = R::testConnection();

if (!$isConn) {
    print "DB CONNECTION FAILED'";
}



$song = R::dispense('song');

function DBsubmitSong($songImage,$sAudio, $sName, $sDescription, $sGenre, $sArtist, $sFeatures, $sProducer)
{
    $book = R::dispense('song');
    $book->songImage = $songImage;
    $book->songAudio = $sAudio;
    $book->songName = $sName;
    $book->songDescription = $sDescription;
    $book->songGenre = $sGenre;
    $book->songArtist = $sArtist;
    $book->songReleaseDate = date("d/m/Y");
    $book->songFeatures = $sFeatures;
    $book->songProducer = $sProducer;
    R::store($book);
}
