<!-- to allow user logout -->

<?php
 session_start();


 session_destroy();
 header('Location: login.php');
 exit;
?>
