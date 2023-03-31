<?php
session_start();
if ($_SESSION['login'] != true  && !isset($_SESSION['id'])){
  header("location: index.php");
}

$user = $_SESSION['id'];
?>