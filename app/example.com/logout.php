<?php
session_start();
$_SESSION['logged in'] = false;
$_SESSION['User'] = NULL; //loggar ut användaren
header("Location: http://localhost:8080");
?>