
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jeopardy! - Login</title>
        <link type = "text/css" rel = "stylesheet" href = "style.css"/>
        <link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <?php
    session_start();
    $csv_file = file_get_contents('accounts.txt');
    $file = fopen("php://temp", 'r+');
    fputs($file,$csv_file);
    rewind($file);
    $users = [];
    while(($data = fgetcsv($file)) !== FALSE){
        $users[] = $data;
    }
    $loginFailed = TRUE;

    for($i = 0; $i < count($users); $i++){
        if(!isset($users[$i][0])){ //Error handling in case of bad pushes to the csv file.
            continue;
        }
        else{
            if($_POST['Username'] == $users[$i][0] && $_POST['Password'] == $users[$i][1]){
                $_SESSION['Name'] = $users[$i][2];
                $_SESSION["Points"] = $users[$i][3];
                $loginFailed = FALSE;
            }
        }
    }
    print_r($users);
    if($loginFailed){ /* if loginfailed == true*/
        $_SESSION['loginFail'] = TRUE;
        header("Location: leaderboard.php");
    }
    else{

        header("Location: leaderboard.php");
    }
        ?>
    </body>
</html>