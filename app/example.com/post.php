<html>
    <head>
        <link rel="stylesheet" media="all" href="style/general.css" /> <!-- >länkar till css-fil</!-->
    </head>
    <body>
        <div class="maincontainer">
        <?php
            require "partials/header.php";
            require_once "partials/connection.php";
            if(isset($_POST[newcomment]))
            { //om användaren kommenterat på ett inlägg så läggs det in här
                $Query = 'SELECT ID, username FROM users WHERE ID = '.$_SESSION['User'].' LIMIT 1;';
                $NameCheck = $sql->query($Query); //hämtar användarens namn från databasen för att lägga till det i kommentaren
                $Check = mysqli_fetch_array($NameCheck);
                $Query ='INSERT INTO comments (Comment, Poster, PostID) VALUES ("'.$_POST[comment].'","'.$Check[username].'",'.$_GET[id].');';
                $sql->query($Query);
            }
            echo '<div class="content">';
            $postid = $_GET[id]; //sparar inläggets id som en variabel
            $Query = "SELECT * FROM blogposts WHERE id = ".$postid.";";
            $PostData = $sql->query($Query); //hämtar info om inlägget
            $Query = "SELECT * FROM images WHERE post_ID = ".$postid.";";
            $ImageName = mysqli_fetch_array($sql->query($Query)); //hämtar info om inläggets bild, om det finns en
            while ($Post = mysqli_fetch_array($PostData))
            { //skriver ut inlägget på sidan
                ?>
                <div class="post">
                    <h4>
                    <?php
                        echo $Post[title];
                    ?>
                    </h4>
                <?php
                if($Post[HasImage] == 1)
                { //om inlägget har en bild så läggs den in här
                    echo '<div><img src="uploads/'.$ImageName[name].'" alt="Related Image"></img></div>';
                }
                echo '<div><p>'.$Post[post].'</p></div>';
                echo '</div>';
            }
            echo "<h2> Comments</h2>";
            $Query = 'SELECT * FROM comments INNER JOIN blogposts ON comments.PostID = blogposts.id WHERE comments.PostID = '.$postid.' ;';
            $Comments = $sql->query($Query);//läser in alla kommentarer som kopplats till inlägget
            while ($Comment = mysqli_fetch_array($Comments))
            { //skriver ut kommentarerna under inlägget
                ?>
                <div class="post">
                <?php
                echo '<h3>'.$Comment[Poster].'</h3>';
                echo $Comment[Comment];
                ?>
                </div>
                <?php
            }
            if($_SESSION['logged in'])
            { //om en användare är inloggad
                echo '<form method="post" action="edit.php?id='.$_GET[id].'" id="Edit">';
                echo '<div><input type="submit" name="EditRequest" value="Edit"/></div>';
                echo '</form>'; //knappen som låter användaren ändra på ett inlägg
                echo '<form method="post" action="post.php?id='.$_GET[id].'" id="Comment">';
                echo '<div><label for="comment">Comment:</label><textarea form="Comment" name="comment" id="comment" maxlength="255"></textarea></div>';
                echo '<div><input type="submit" name="newcomment" value="Comment"/></div>';
                echo '</form>'; //formuläret för att skriva nya kommentarer på ett inlägg
            }
            echo "</div>";
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>