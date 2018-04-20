<?php
require_once "partials/connection.php";
if($_SESSION['logged in'] == false)
{ //stoppar försök att ta bort inlägg utan att vara inloggade
    header("Location: http://localhost:8080/dashboard.php");
}
$Query = "DELETE FROM blogposts WHERE id = ".$_GET[id].";";
$sql->query($Query); //tar bort inlägget
header("Location: http://localhost:8080/dashboard.php");
?>