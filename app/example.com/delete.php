<?php
require_once "partials/connection.php";
if($_SESSION['logged in'] == false)
{ //stoppar försök att ta bort inlägg utan att vara inloggade
    header("Location: index.php");
}
$Query = "DELETE FROM blogposts WHERE id = ".$_GET[id].";";
$sql->query($Query); //tar bort inlägget
    header("Location: dashboard.php");
?>