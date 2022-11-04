
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jeopardy! - Sign Up</title>
        <link type = "text/css" rel = "stylesheet" href = "style.css"/>
        <link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
    <?php
            session_start();
            if(isset($_SESSION['userNameTaken'])){
                //Will let the user know that their Password is not correct.
                if($_SESSION['userNameTaken']){ /*if session[loginfail] == true*/
                    echo "<h2>Username is already taken!</h2>";
                    $_SESSION['userNameTaken'] = FALSE;
                }
            }
            if(isset($_SESSION['signupFailed'])){
                //Will let the user know that their Password is not correct.
                if($_SESSION['signupFailed']){ /*if session[loginfail] == true*/
                    echo "<h2>Password should have 8 characters min, 1 digit, 1 uppercase & 1 special character</h2>";
                    $_SESSION['signupFailed'] = FALSE;
                }
            }

        ?>
        
        <form action = "signup-submit.php" method = "POST">
            <fieldset>
                <h1>Sign Up!</h1>
                <label>
                    <input type = "text" size = "16" name = "Username" placeholder="Username" required>
                </label>
                <label>
                    <input type = "password" size = "16" name = "Password" placeholder="Password" required>
                </label>
                <label>
                    <input type = "text" size = "16" name = "Name" placeholder="Name" required>
                </label>
                <input type = "submit" name ="Submit" value = "Sign Up!">
                <p>Already have an account? <a href="index.php">Log in</a></p>
            </fieldset>
        </form>
    </body>
</html>