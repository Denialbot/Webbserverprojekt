<?php
    $sql = new mysqli("localhost","root","secret","example"); //ansluter till databasen example på localhost med en variabel
    if($sql->connect_error){ //om anslutningen misslyckas...
        die('Unable to connect to database [' . $sql->connect_errno . ']');
    }
?>