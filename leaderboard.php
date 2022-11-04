<?php
    // Start the session
    session_start();
    require_once('functions.php');
    if(!isset($_SESSION['Name'])){
      header('Location: index.php');
    }

    if(!empty($_POST["remember"])){
        setcookie("Username", $_POST["Username"], time() + 3600);
        setcookie("Password", $_POST["Password"], time()+3600);
    }else{
        setcookie("Username","");
        setcookie("Password","");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="jeopardy.css">
<link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
<title> Jeopardy Main Page</title>
</head>
<body>
<div class = "navigation">
<table class = tableNav>
    <tr>
        <th class = "navTh">Welcome <?php echo $_SESSION["Name"]; ?></th>

        <th class = "navTh"><a class = "navLink" href = "leaderboard.php">Home</a></th>
        <th class = "navTh"><a class = "navLink" href = "logout.php">Log Out</a></th>
    </tr>
</table>
</div>

<div class="jeo">JEOPARDY!</div>


<p>Score: <?php echo $_SESSION["totalScore"]; ?></p>
    <form method="POST" action="board.php">
        <button class="playButton"> PLAY</button>
    </form>


<?php




$parameter = $_SERVER['QUERY_STRING'];
$accounts  = file_get_contents('leaderboard.txt');
$rows = explode("\n", $accounts);
foreach ($rows as $row => $v) {
    $row_data = explode(',', $v);
    if ($row_data[0] == $parameter) {
        $data = $row_data;
    }
}

//$score = $_SESSION['totalScore'];
//$index = $accounts[0];
//$totalPoints = $_SESSION["totalScore"];
//$accountsFile[$index] = [
//    'highscore' => $score,
//    'name' => $_SESSION['Name'],
//];
//
//
//
//$accountSorted = sort_highscore($accountsFile);
//function sort_highscore($accounts){
//    foreach($accounts as $key =>$row){
//        $highscore[$key] = $row['highscore'];
//    }
//    array_multisort($highscore, SORT_ASC, $accounts);
//    return $accounts;
//}

?>

<?php
//
//$board = explode(";", file_get_contents("leaderboard.txt"));
//echo "<h1>LeaderBoard</h1>";
//
//foreach ($board as $b){
//    $current = explode(",", $b);
//    echo $current[1] . "&nbsp:". $current[0] . "<br>";
//}
//?>

<h2> LeaderBoard</h2>
<div id="leaderBoard">
    <table class = "leaderscoresTable">
        <thead class = "theader">
            <tr>
                <th> Rank</th>
                <th> User</th>
                <th> Score</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>test</td>
            <td>10000</td>
        </tr>
<!--        --><?php
//
//            echo "<h1>LeaderBoard</h1>";
//            for ($i=0; $i<1; $i++){?>
                <tr>
<!--                    <td>--><?php //echo $i+2;?><!--</td>-->
                    <td>2</td>
                    <td><?php echo $_SESSION['Name'];?></td>

                    <td><?php echo $_SESSION['totalScore'];?></td>
<!--                    <td>--><?php //echo $accountSorted[$i]['name'];?><!--</td>-->
<!--                    <td>--><?php //echo $accountSorted[$i]['highscore'];?><!--</td>-->
<!--                </tr>-->
<!--            --><?php
//            }
//            ?>
        <tr>
            <td>3</td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>


</div>

</body>
</html>