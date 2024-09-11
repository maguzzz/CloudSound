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

function DBcreateUser($uName,$uEmail,$uPassword)
{

    $user= R::dispense("user");

    $user->userName = $uName;
    $user->userEmail = $uEmail;
    $user->userPassword = $uPassword;

    R::store($user);
}

function DBsubmitSong($sCreatorId, $sName, $sDescription, $sGenre, $sArtist, $sFeatures, $sProducer)
{
    $userExists = R::count('user', 'id = ?', bindings: [$sCreatorId]);

    /*if (!$userExists) {
        print('ERROR: INVALID USER ID');
        return;
    }*/

    $song = R::dispense(typeOrBeanArray: 'song');

    $song->songCreatorId = $sCreatorId;
    $song->songName = $sName;
    $song->songDescription = $sDescription;
    $song->songGenre = $sGenre;
    $song->songArtist = $sArtist;
    $song->songReleaseDate = date("d/m/Y");
    $song->songFeatures = $sFeatures;
    $song->songProducer = $sProducer;

    R::store($song);

    return $song->id;
}

function DBreassignSongSource($sId, $sImage, $sAudio) {

    $song = R::load('song', $sId);

    if (!$song->id) {
        print('ERROR: SONG NOt FOUND');
        return;
    }

    $song->songImage = $sImage;
    $song->songAudio = $sAudio;

    R::store($song);
}


function DBGetSongs($parameter = null){
    if($parameter != null){
        $searchSong = R::find( 'song', ' song_name LIKE ? ', ['%'.$parameter .'%'] );
        print(implode(",",$searchSong));
    }else{
        $allSongs = R::findAll('song');
        print(implode(",",$allSongs));
    }
}