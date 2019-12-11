<?php
require_once __DIR__ . '/vendor/autoload.php';

$provider = new League\OAuth2\Client\Provider\Github([
    'clientId' => 'Iv1.124bbff3db48ff82',
    'clientSecret' => '4161f54a2913c443c0f573a6c0db75f9baa96995',
    'redirectUri' => 'http://localhost/socialreg/github-callback.php',
]);