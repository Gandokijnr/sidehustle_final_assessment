<?php
$connect = mysqli_connect('localhost', 'root', '', 'user_registration');

if (!$connect) {
    die("database not connected". mysqli_error($connect));
}
?>