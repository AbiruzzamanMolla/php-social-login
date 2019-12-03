<?php
class MySQL{
    public function __construct(){
        $conn = mysqli_connect('localhost', 'root', '', 'socialogin', 3306);
        return $conn;
    }
}
?>