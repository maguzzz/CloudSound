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

function DBcreateUser($uName, $uEmail, $uPassword)
{
    $user = R::dispense(typeOrBeanArray: 'user');
    $checkUser = R::findAll('user');
    $checkUser  = R::findOne( 'user', ' user_name = ?', [$uName ] );

    if ($checkUser) {
        echo "user already exists: " . $checkUser->userName;
    } else {


        $user->userName = $uName;
        $user->userEmail = $uEmail;
        $user->userPassword = $uPassword;

        R::store($user);
        echo "user created: " . $uName;
    }
}


function DbFindUserId($uEmail, $uPassword)
{
  $checkUser = R::findOne('user', 'user_email = ? AND user_password = ?', [$uEmail, $uPassword]);

    return $checkUser;
}

function getUser($userId = null) {

    if ($userId != null) {
        return R::findOne('user', 'id = ?', [$userId]);
    }
    return R::findAll('user');
}


function DBsubmitSong($sCreatorId, $sName, $sDescription, $sGenre, $sArtist, $sFeatures, $sProducer)
{
    $userExists = R::count('user', 'id = ?', bindings: [$sCreatorId]);

    // if (!$userExists) {
    //     print('ERROR: INVALID USER ID');
    //     return;
    // }

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

function DBreassignSongSource($sId, $sImage, $sAudio)
{

    $song = R::load('song', $sId);

    if (!$song->id) {
        print ('ERROR: SONG NOT FOUND');
        return;
    }

    $song->songImage = $sImage;
    $song->songAudio = $sAudio;

    R::store($song);
}


function DBGetSongs($parameter = null)
{
    if ($parameter != null) {
        $searchSong = R::find('song', ' song_name LIKE ? ', ['%' . $parameter . '%']);
        return $searchSong;
    } else {
        $allSongs = R::findAll('song');
        return $allSongs;
    }
}

function deleteSong($songId) {

    $song = R::load('song', $songId);
    R::trash($song);

}