<html lang="en">
<head>
   <link rel="stylesheet" href="jeopardy.css">
   <link rel="icon" type="image/x-icon" href="jeopardyLogo.jfif">
   <title> Jeporady Question Page</title>
</head>
<body>

   <?php
   require_once('functions.php');

   $arrayPoints = [
      '$200'  => 200,
      '$400'  => 400,
      '$600'  => 600,
      '$800'  => 800,
      '$1000' => 1000,
   ];
   $data = array(
      "1",
      "Question HERE",
      "Ans1",
      "Ans 2",
      "Ans 3",
      "Ans 4",
      "Ans 1",

   );
   $parameter = $_SERVER['QUERY_STRING'];
   session_start();

   $ansUnserialize = @$_SESSION['array_ans'];
   $ansArray = (array) maybe_unserialize($ansUnserialize);
   if (isset($ansArray[$parameter]) and $ansArray[$parameter]['point'] > 0) {//if player answers question and gets points. should be able to not click and see ans
      header('Location: board.php?success=' . $parameter);
   }
   elseif(isset($ansArray[$parameter]) and $ansArray[$parameter]['point'] < 0){
       header('Location: board.php?wrong=' . $parameter);
   }
   $txt_file  = file_get_contents('questions.txt');
   $rows = explode("\n", $txt_file);
   foreach ($rows as $row => $v) {
      $row_data = explode(',', $v);
      if ($row_data[0] == $parameter) {
         $data = $row_data;
      }
   }
   $selected = -1;
   if (isset($_POST['ans'])) {
      $answer = trim($_POST['ans']);
      $val = trim($data[7]);
      $index = $data[0];
      if ($answer == $data[6]) {
         $point = (float) @$arrayPoints[$val];
      } else {
         $point = -(float) @$arrayPoints[$val];
      }

      $ansArray[$index] = [
         'index' => $index,
         'point' => $point,
      ];

      $_SESSION['array_ans'] = maybe_serialize($ansArray);
      header('Location: board.php');
   }
   ?>
   <div class="jeo"> JEOPARDY !</div>


   <div class="questionChosen">
      <h1><?php echo $data[1] ?></h1>
       <br>

      <form method="post">
            <div class = "Choices"
          <label><input type="radio" name="ans" value="2" "/><?php echo "&emsp;".$data[2]."<br>" ?></label>
            <br>
            <label><input type="radio" name="ans" value="3" /><?php echo "&emsp;".$data[3]."<br>" ?></label>
            <br>
            <label><input type="radio" name="ans" value="4" /><?php echo "&emsp;".$data[4]."<br>" ?></label>
            <br>
            <label><input type="radio" name="ans" value="5" /><?php echo "&emsp;".$data[5]."<br>" ?></p></label>
         <br>
          </div>
          <input type="submit" value="Submit" class="qSubmitButton" />
      </form>

   </div>



</body>

</html>