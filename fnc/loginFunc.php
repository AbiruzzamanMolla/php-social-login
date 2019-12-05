<?php

function login($email, $password){
    global $conn;
    $query = "SELECT `id`, `name`, `phone`, `email` FROM users WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($query);
    $row_cnt = $result->num_rows;
    
    
    if ($row_cnt == 1) {
        $row = $result->fetch_array();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];

        //redirect after successful login
        header("Location: profile.php");
    } else {
        header("Location: login.php");
    }
}
?>