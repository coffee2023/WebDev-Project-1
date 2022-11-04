
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
            $score = 0;
            $dataPush = array(
                'UserName' => $_POST['Username'],
                'Password' =>  $_POST['Password'],
                'Name' =>  $_POST['Name'],
                'Score' => $score
            );

            $handle = fopen("accounts.txt", "r");
            $exsits = false;
            $signupFailed = TRUE;           //this will help in signup.php when displaying error pass message
            $userTaken=TRUE;
            if($handle){
                while (!feof($handle)){
                    $line = fgets($handle);
                    $str_arr = explode(",", $line);     //will separate all the fields in accounts.txt usint separator ','
                    if ($str_arr[0] == $dataPush['UserName']) {  //if the entered username is already used
                        $exsits = true;                        //username taken
                    }
                }

                if (!$exsits){                                 //username is not taken
                    $pass = $_POST["Password"];
                    $errors = array();
                    if (strlen($pass) < 8 || !preg_match("/\d/", $pass) || !preg_match("/[A-Z]/", $pass) || !preg_match("/\W/", $pass)) {
                        $errors[] = "Password should be min 8 characters, 1 digit, 1 Capital Letter, 1 special character";
                    }
                    if (!$errors) {
                        $user_details = $dataPush;                  //sets the new username/pass to $user_details
                        $new_data = implode(",", $user_details);    //creates the new account
                        file_put_contents("accounts.txt", PHP_EOL . $new_data, FILE_APPEND);  //will place it in txt file

//                        $signupFailed=FALSE;
//                        $userTaken=FALSE;
                        header('Location: index.php');          //sends the user to the signin page after successfully creating an account
                    }
                }
                else {

                    if($signupFailed){
                        $_SESSION['signupFailed'] = TRUE;
                        header("Location: signup.php");

                    }
                    if($userTaken) {
                        $_SESSION['userNameTaken'] = TRUE;
                        header("Location: signup.php");
                    }
                }
            fclose($handle);
            } else {
                echo "cannot read file";
            }





?>
</body>
</html>



