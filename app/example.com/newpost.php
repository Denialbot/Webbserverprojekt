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
            { //om ingen användare är inloggad så laddas startsidan in
                header("Location: index.php");
            }
            ?>
            <div class="content">
            <form method="post" enctype="multipart/form-data" action="newpost.php" id="blogpost">
            <div><label for="Title">Blog post title:</label><input type="text" name="Title" id="Title"/></div>
            <div><label for="content">Post content:</label><textarea form="blogpost" name="content" id="content" maxlength="1000"></textarea></div>
            <div><label for="image">Image for post:</label><input type="file" name="image" id="image"/></div>
            </form> <!-- >formuläret för att skapa nya inlägg </!-- >
            <?php
            if(isset($_POST['PostAttempt']))
            { //om ett nytt inlägg ska skapas
                $hasimage = 0;
                $successfulupload = true;
                $title = $_POST['Title'];
                $content = $_POST['content'];
                if(is_null($title) || is_null($content) || $title == '' || $content == '')
                { //om antingen titel eller innehåll är tom
                    echo '<div class="errormessage"> The blogpost must have a title and content! </div>';
                    $successfulupload = false; //stoppar uppladdning
                }
                if(strlen($title) > 40)
                { //om titeln är för lång
                    echo '<div class="errormessage"> The title is too long! </div>';
                    $successfulupload = false; //stoppar uppladdning
                }
                if(basename($_FILES['image']["name"]))
                { //om det finns en fil
                    if(getimagesize($_FILES["image"]["tmp_name"]))
                    { //om det är en bild
                        if($_FILES["image"]["size"] < 4900000)
                        { // om bilden inte är för stor
                            $filename = time().'-'.basename($_FILES["image"]["name"]);
                            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$filename); //filen flyttas till uploads
                            $hasimage = 1; //variabel för databasen
                        }
                        else
                        {
                            echo '<div class="errormessage"> The image is too large! </div>';
                            $successfulupload = false; //stoppar uppladdning
                        }
                    }
                    else
                    {
                        echo '<div class="errormessage"> The file provided is not an image! </div>';
                        $successfulupload = false; //stoppar uppladdning
                    }
                }
                if($successfulupload == true)
                { //om allt stämmer med uppladdningen
                    $SQL = 'INSERT INTO blogposts (post,title, author_id, HasImage) VALUES ("'.$content.'","'.$title.'",'.$_SESSION['User'].', '.$hasimage.' );';
                    $sql->query($SQL); //lägger in inlägget i databasen
                    if($hasimage == 1)
                    { //lägger in info om bilden i databasen
                        $SQL = 'SELECT * FROM blogposts WHERE post = "'.$content.'" AND title = "'.$title.'" AND author_id = '.$_SESSION['User']. ' ORDER BY id DESC;';
                        $postinfo = $sql->query($SQL); //hämtar det nya inläggets id
                        $post = mysqli_fetch_array($postinfo);
                        $SQL = 'INSERT INTO images (name, post_ID) VALUES ("'.$filename.'","'.$post[id].'");';
                        $sql->query($SQL);
                    }
                    header("Location: index.php"); //skickar användaren till start
                }
            }
            echo '</div>';
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>