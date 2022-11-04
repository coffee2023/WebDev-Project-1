<?php
// Start the session
session_start();
require_once('functions.php');
?>

<?php
$totalPoint = get_total_point();
$_SESSION["totalScore"] =0;
if (!isset($_SESSION['Name'])) {
    header('Location: index.php');
} else {
    $moneyGain = '';
    $moneyLost = '';

    $questionPoint = get_single_point();
    $_SESSION['max'] = $totalPoint;
    if ($questionPoint > 0) {
        $moneyGain = $_SESSION['Name'] . " You Earned $" . $questionPoint;
        $totalPoint = +$questionPoint;

    } else if ($questionPoint < 0) {
        $moneyLost = $_SESSION['Name'] . " You Lost " . $questionPoint;
        $totalPoint = -$questionPoint;
    }
}

    $_SESSION["totalScore"] = $totalPoint;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="jeopardy.css">
    <link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
    <title> Jeporady Main Page</title>
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


    <div class="jeo"> JEOPARDY!</div>

    <h1> <?php echo $moneyGain;?></h1>
    <h1> <?php echo $moneyLost;?></h1>

    <p>Score: <?php echo $_SESSION["totalScore"]; ?></p>



    <?php
    if( isset($_GET['success']) || isset($_GET['wrong'])) {
        $_SESSION["totalScore"] = $totalPoint;
        echo "<h3 class='success'>You already answered this question </h3>";
    }
    ?>
    <table class = "boardTable">
        <tr>
            <th class="boardTh"> Fruit</th>
            <th class="boardTh"> Math</th>
            <th class="boardTh"> States</th>
            <th class="boardTh"> Colors</th>
            <th class="boardTh"> Dates</th>
            <th class="boardTh"> Countries</th>
        </tr>
        <!-- $200 Value Row -->
        <tr>
            <td class="boardTd"> <a href="questionScreen.php?1"> $200</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?6"> $200</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?11"> $200</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?16"> $200</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?21"> $200</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?26"> $200</a> </td>
        </tr>
        <!-- $400 Value Row -->
        <tr>
            <td class="boardTd"> <a href="questionScreen.php?2"> $400</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?7"> $400</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?12"> $400</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?17"> $400</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?22"> $400</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?27"> $400</a> </td>
        </tr>
        <!-- Creating $600 Value Row For Game Board -->
        <tr>
            <td class="boardTd"> <a href="questionScreen.php?3"> $600</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?8"> $600</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?13"> $600</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?18"> $600</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?23"> $600</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?28"> $600</a> </td>
        </tr>
        <!-- Creating $800 Value Row For Game Board -->
        <tr>
            <td class="boardTd"> <a href="questionScreen.php?4"> $800</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?9"> $800</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?14"> $800</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?19"> $800</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?24"> $800</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?29"> $800</a> </td>
        </tr>
        <!-- Creating $1000 Value Row For Game Board -->
        <tr>
            <td class="boardTd"> <a href="questionScreen.php?5"> $1000</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?10"> $1000</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?15"> $1000</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?20"> $1000</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?25"> $1000</a> </td>
            <td class="boardTd"> <a href="questionScreen.php?30"> $1000</a> </td>
        </tr>
    </table>

</body>
</html>