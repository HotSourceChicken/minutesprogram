
<?php
session_start();
require_once 'vendor/autoload.php';

$id_token = filter_input(INPUT_POST, 'id_token');
define('CLIENT_ID', '318463674596-bbff3nork43dno3q2t2vc13n5nmsqd58.apps.googleusercontent.com');

$client = new Google_Client(['client_id' => CLIENT_ID]); 
$payload = $client->verifyIdToken($id_token);
if ($payload) {
    $userid = $payload['sub'];
}

//DBなどとのやりとりする

$_SESSION['login'] = true;
exit;