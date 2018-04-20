<html>
    <head>
        <title>Blog</title> <!-- >ändrar sidans fliknamn</!-->
        <link rel="stylesheet" media="all" href="style/general.css" /> <!-- >kopplar sidan till css-fil</!-->
        <script type="text/javascript" src="script/script.js"></script> <!-- >kopplar sidan till javascript-fil</!-->
    </head>
    <body>
        <div class="maincontainer">
        <?php
            require "partials/header.php";
            require_once "partials/connection.php"; //kopplar sidan till databasen
            if($_SESSION['logged in'] == true)
            { //om an användare är inloggad
                $Query = 'SELECT ID, username FROM users WHERE ID = '.$_SESSION['User'].';';
                $NameCheck = $sql->query($Query);
                $Check = mysqli_fetch_array($NameCheck);
                echo "inloggad som " . $Check[username]; //skriver ut vem som är inloggad på toppen av skärmen
            }
            echo '<div class="content">';
            $SQL = "SELECT * FROM blogposts";
            $Blogposts = $sql->query($SQL); //hämtar information om alla blogginlägg
            echo '<h1> Hello World </h1>';
            while ($Post = mysqli_fetch_array($Blogposts))
            { //skriver ut alla blogginlägg i varsin div-ruta
                echo '<div class="post">';
                echo '<h4>';
                echo $Post[title];
                echo '</h4>';
                if(strlen($Post[post]) < 20) //om inlägget är kortare är 20 tecken
                {
                    echo '<p>'.$Post[post].'</p>';
                }
                else
                { //om inlägget är för långt så "huggs det av" för att spara utrymme på sidan
                    $Cutstring = substr($Post[post],0,15) . "...";
                    echo '<p>'.$Cutstring.'</p>';
                }
                echo '<a href="post.php?id='.$Post[id].'">Read more...</a>'; //länk till resten av blogginlägget
                echo '</div>';
            }
            echo '</div>';
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>