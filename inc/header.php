<!doctype html>
<html lang="en">

<head>
    <title>Social Login system</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand text-capitalize" href="index.php">Social Login System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <div class="my-2 my-lg-0">
                <?php
                if(!session_id()){
                    session_start();
                }
                if (isset($_SESSION['fb_access_token']) || isset($_SESSION['g_access_token']) || isset($_SESSION['git_access_token']) || isset($_SESSION['id'])) {
                    echo '<a href="logout.php" class="btn btn-danger text-white">Logout</a>';
                }
                ?>
            </div>
        </div>
    </nav>