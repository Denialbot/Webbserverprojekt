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
            {
                header("Location: index.php");
            }
            if(isset($_POST['EditAttempt']))
            {
                $successfulupdate = true;
                $title = $_POST['Title'];
                $content = $_POST['content'];
                if(is_null($title) || is_null($content) || $title == '' || $content == '')
                {
                    echo '<div class="errormessage"> The blogpost must have a title and content! </div>';
                    $successfulupdate = false;
                }
                if(strlen($title) > 40)
                {
                    echo '<div class="errormessage"> The title is too long! </div>';
                    $successfulupdate = false;
                }
                if($successfulupdate == true)
                {
                    $SQL = 'UPDATE blogposts SET title = "'.$title.'", post = "'.$content.'" WHERE id = '.$_GET['id'].';';
                    $sql->query($SQL);
                    echo mysqli_error($sql);
                    header("Location: post.php?id=".$_GET[id]);
                }
            }
            else
            {
                $SQL = 'SELECT * FROM blogposts WHERE id = '.$_GET['id'].' LIMIT 1;';
                $postdata = mysqli_fetch_array($sql->query($SQL));
                $title = $postdata[title];
                $content = $postdata[post];
            }
            ?>

            <div class="content">
                <form method="post" action="edit.php?id='.$_GET[id].'" id="edit">
                <?php
                    echo '<div><label for="Title">Blog post title:</label><input type="text" name="Title" id="Title" value="'.$title.'"/></div>';
                    echo '<div><label for="content">Post content:</label><textarea form="edit" name="content" id="content" maxlength="1000">'.$content.'</textarea></div>';
                ?>
                    <div><input type="submit" value="Post" name="EditAttempt"/></div>
                </form>
            </div>
            <?php
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>