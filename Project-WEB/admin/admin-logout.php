<?php
session_start();
session_unset();
session_destroy();
header("Location: /Project-WEB/home.php");
exit();
?>
