<html>
    <head>
        <link rel="stylesheet" media="all" href="style/general.css" /> <!-- >länkar sidan till css-fil</!-->
    </head>
    <body>
        <div class="maincontainer">
        <?php
            require "partials/header.php";
            require_once "partials/connection.php";
            if(isset($_POST[registration]))
            { //om en ny användare försöker registrera sig
                $Overlap = false; //variabel för om ett användarnamn redan används
                $Query = 'SELECT COUNT(username) AS overlap FROM users where username = '.$_POST[Username].';';
                $Check = $sql->query($Query); //läser in hur många gånger ett användarnamn förkommer i databasen.
                while($Security = mysqli_fetch_array($Check))
                {
                    if($Security[overlap] > 0)
                    { //om namnet redan används
                        $Overlap = true;
                    }
                }
                if($Overlap == false and $_POST[Password] == $_POST[CPassword])
                { //om användarnamnet är nytt och lösenordet skrivits in rätt två gånger
                    $NewHash = password_hash($_POST[Password],PASSWORD_DEFAULT); //krypterar lösenordet
                    $Query = 'INSERT INTO users (username, password) VALUES ("'.$_POST[Username].'","'.$NewHash.'");';
                    $sql->query($Query); //registrerar användaren i databasen
                    $_SESSION['logged in'] = true; //loggar in användaren
                    $_SESSION['User'] = $_POST[Username]; //loggar in användaren
                    header("Location: http://localhost:8080"); //skickar användaren till startsidan
                }
            }
            echo '<div class="content">';
            echo '<form method="post" action="register.php" id="blogpost">';
            echo '<div><label for="Username">Username:</label><input type="text" name="Username" id="Username"/></div>';
            echo '<div><label for="Password">Password:</label><input type="password" name="Password" id="Password"/></div>';
            echo '<div><label for="CPassword">Confirm Password:</label><input type="password" name="CPassword" id="CPassword"/></div>';
            echo '<div><input type="submit" value="Register" name="registration"/></div>'; //registreringsformuläret
            echo '</form>';
            echo '</div>';
            require "partials/footer.php";
        ?>
        </div>
    </body>
</html>