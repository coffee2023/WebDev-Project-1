
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jeopardy!</title>
        <link type = "text/css" rel = "stylesheet" href = "style.css"/>
        <link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>

    <?php
            session_start();
            if(isset($_SESSION['loginFail'])){
                //Will let the user know that their Username or Password is not correct.
                if($_SESSION['loginFail']){ /*if session[loginfail] == true*/
                    echo "<h2>Incorrect username or password!</h2>";
                    $_SESSION['loginFail'] = FALSE;
                }
            }
        ?>
        <form action = "login-submit.php" method = "POST">
            <fieldset>
                <h1>Sign in!</h1>
                <label>
                    <input type = "text" placeholder="UserName" size = "16" name = "Username"
                           value = "<?php if(isset($_COOKIE["Username"])){echo $_COOKIE["Username"];}?>" required>
                </label>
                <label>
                    <input type = "password" placeholder="Password" size = "16" name = "Password"
                           value = "<?php if(isset($_COOKIE["Password"])){echo $_COOKIE["Password"];}?>" required>
                </label>
                <p><input type = "checkbox" name = "remember" >Remember me</p>
                <input type = "submit" name="Submit" value = "Login"/>
                <p>Don't have an account? <a href = "signup.php">Sign Up</a></p>
            </fieldset>
        </form>
    </body>
</html>
