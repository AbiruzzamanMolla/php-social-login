<?php

//Include Google Client Library for PHP autoload file
require_once __DIR__ . '/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('516529512407-dbgf4j4ln0tg21avjro53dt0o52t8sep.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('ulV670vQh9DPbxAiaxMh6vnA');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/socialreg/google.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

