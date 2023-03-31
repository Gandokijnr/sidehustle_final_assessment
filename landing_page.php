<?php
// session_start();
require 'session.php';
require 'header.php';
?>

WELCOME <?= $_SESSION['id']; ?>
<p><a href="logout.php">logout</a></p>

<?php
require 'footer.php';
?>