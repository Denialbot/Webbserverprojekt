<?php
session_start();
$_SESSION['logged in'] = false;
$_SESSION['User'] = NULL; //loggar ut användaren
session_destroy();
header("Location: index.php");
?>