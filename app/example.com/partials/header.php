<?php
session_start();
echo '<div class="header">';
echo '<a href="index.php" class="menuitem"> Blog </a>';
if($_SESSION['logged in'] == true)
{ //om en användare är inloggad så visas knapparna nedan
echo '<a href="newpost.php" class="menuitem"> Create Post </a>';
echo '<a href="dashboard.php" class="menuitem"> Admin Dashboard </a>';
echo '<a href="logout.php" class="menuitem"> Log out </a>';
}
else
{ //annars visas dessa knappar
echo '<a href="register.php" class="menuitem"> Register </a>';
echo '<a href="login.php" class="menuitem"> Log In </a>';
}
echo "</div>";
?>