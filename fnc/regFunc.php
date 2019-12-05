<?php

function register($name, $email, $phone, $password){
    global $conn;
    $query = "INSERT INTO `users` (`name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$password')";
    $result = $conn->query($query);

    if($result){
        echo "Registation done!";
    }
}

?>