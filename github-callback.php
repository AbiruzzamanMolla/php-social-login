<?php
//Include Google Client Library for PHP autoload file
if (!session_id()) {
    session_start();
}
require_once __DIR__ . '/vendor/autoload.php';

$provider = new League\OAuth2\Client\Provider\Github([
'clientId' => 'Iv1.124bbff3db48ff82',
'clientSecret' => '4161f54a2913c443c0f573a6c0db75f9baa96995',
'redirectUri' => 'http://localhost/socialreg/github-callback.php',
]);

if (!isset($_GET['code'])) {

// If we don't have an authorization code then get one
// $authUrl = $provider->getAuthorizationUrl();
$options = [
        'scope' => ['user', 'user:email', 'repo']
    ];
$authorizationUrl = $provider->getAuthorizationUrl($options);
$_SESSION['oauth2state'] = $provider->getState();
header('Location: '.$authUrl);
exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

unset($_SESSION['oauth2state']);
exit('Invalid state');

} else {

// Try to get an access token (using the authorization code grant)
$token = $provider->getAccessToken('authorization_code', [
'code' => $_GET['code']
]);

// Optional: Now you have a token you can look up a users profile data
try {

// We got an access token, let's now get the user's details
$user = $provider->getResourceOwner($token);
$_SESSION['git_user'] = $user->getNickname();

} catch (Exception $e) {

// Failed to get user details
exit('Oh dear...');
}

// Use this to interact with an API on the users behalf
$_SESSION['git_access_token'] = $token->getToken();
header("Location: profile.php");
}