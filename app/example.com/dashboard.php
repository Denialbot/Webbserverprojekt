<html>
    <head>
        <link rel="stylesheet" media="all" href="style/general.css" /> <!-- >länkar sidan till css-fil</!-->
    </head>
    <body>
        <div class="maincontainer">
        <?php
            require "partials/header.php";
            require_once "partials/connection.php";
            if($_SESSION['logged in'] == false)
            { //om ingen användare är inloggad så laddas huvudsidan in igen
                header("Location: http://localhost:8080/index.php");
            }
            echo '<div class="content">';
            $Query = "SELECT id, title FROM blogposts";
            $Posts = $sql->query($Query); //hämtar id och namn på alla inlägg
            while ($Post = mysqli_fetch_array($Posts))
            {
                echo '<div id="post-'.$Post[id].'">';
                echo '<p class="pseudolabel">Title: '.$Post[title].' </p>';
                echo '<a href="#" data-id="'.$Post[id].'" class="DEATH"> DELETE</a>'; //denna länk är kopplad till JS-filen
                echo "</div>";
            }
            echo '</div>';
            require "partials/footer.php";
        ?>
        <script type="text/javascript" src="script/script.js"></script> <!--  >länkar sidan till javascript-fil</!--  >
        </div>
    </body>
</html>