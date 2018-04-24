<html>
    <head>
        <link rel="stylesheet" media="all" href="style/general.css" /> <!-- >länkar sidan till css-fil</!-->
    </head>
    <body>
        <div class="maincontainer">
        <?php
            require "partials/header.php";
            require_once "partials/connection.php";
            if($_SESSION['logged in'] == true)
            { //om en användare redan är inloggad så laddas huvudsidan in igen 
                header("Location: index.php");
            }
            if(isset($_POST[loginattempt]))
            { //om ett inloggningsförsök har gjorts
                $Query = 'SELECT * FROM users WHERE username = "'.$_POST[Username].'" LIMIT 1;';
                $Security = $sql->query($Query); //hämtar data om användaren
                while($Check = mysqli_fetch_array($Security))
                {
                    if(password_verify($_POST[Password], $Check[password]))
                    { //om lösenordet stämmer så loggas användaren in
                        $_SESSION['logged in'] = true;
                        $_SESSION['User'] = $Check[ID];
                        header("Location: dashboard.php");
                    }
                    else
                    { //om lösenordet är fel skickas användaren till startsidan utan att loggas in
                        $_SESSION['logged in'] = false;
                        $_SESSION['User'] = NULL;
                        header("Location: index.php");
                    }
                }
            }
            ?>
            <div class="content">'
                <form method="post" action="login.php" id="Login">
                    <div><label for="Username">Username:</label><input type="text" name="Username" id="Username"/></div>
                    <div><label for="Password">Password:</label><input type="password" name="Password" id="Password"/></div>
                    <div><input type="submit" name="loginattempt" value="Log In"/></div>
                </form>
            </div>
            <?php
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>