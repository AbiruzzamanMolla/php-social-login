<?php
session_start();
if(isset($_SESSION['access_token']) || $_SESSION['id']){
    session_destroy();
    header("Location: index.php");
}
?>