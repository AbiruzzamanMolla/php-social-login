<?php
// start the session
session_start();
// include autoloader
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
    'app_id' => '710436312813562',
    'app_secret' => 'eff5c4e95706df7d850501d16f030b25',
    'default_graph_version' => 'v2.10',
    //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$loginUrl = $helper->getLoginUrl('http://localhost/socialreg/login.php');

try {
    // get accessToken
    $accessToken = $helper->getAccessToken();
    // set accessToken in session
    if(isset($accessToken)){
        $_SESSION['access_token']= (string) $accessToken;
    }

} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} 


?>