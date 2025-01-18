
<?php
session_start();
unset($_SESSION['members_email']);
unset($_SESSION['members_username']);
session_destroy();
header("location:index.php");
?>
