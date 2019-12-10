<?php

//index.php

//Include Configuration File
include('google-init.php');


if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        //Below you can find Get profile data and store into $_SESSION variable
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}
$login_button = '';
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a class="btn btn-social-icon btn-google" href="' . $google_client->createAuthUrl() . '"><span class="fa fa-google"></span></a>';
}

?>
<?php include('inc/header.php'); ?>
<div class="container">
    <br />
    <h2>PHP Login using Google Account</h2>
    <br />
    <div class="panel panel-default">
        <?php
        if ($login_button == '') {
            echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
            echo '<img src="' . $_SESSION["user_image"] . '" class="img-thumbnail rounded mx-auto d-block" heigh="900px" width="300px" />';
            echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
            echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
            echo '<h3><a href="logout.php">Logout</h3></div>';
        } else {
            echo '<div align="center">' . $login_button . '</div>';
        }
        ?>
    </div>
</div>
<?php include('inc/footer.php'); ?>