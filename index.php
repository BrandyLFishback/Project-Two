<!DOCTYPE html>
<?php
 include ("inc/questions.php");
 session_start();
 function redirect() {
     header('location:inc/endgame.php');
     exit;
 }
$pageTitle = "Math Quiz: Addition";
$answer = trim(filter_input(INPUT_POST, "answer", FILTER_SANITIZE_STRING));

//set session score
if(!isset($_SESSION["score"])){
  $_SESSION["score"] = 0;
}
//shuffle questions and hold them in $_SESSION Variable
if(!$_SESSION["questions"]) {
  shuffle($questions);
  $_SESSION['questions'] = $questions;
}


//keep track of what question the quiz is on
if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] > 10)){

  $_SESSION["counter"] = 1;

} else {
    $_SESSION["counter"] += 1;
}

//set the counter to 0
$index = $_SESSION["counter"] - 1;

//find correct answer
if($_SESSION["questions"][$index - 1]["correctAnswer"] == $answer){
  echo "<br></br>";
  echo "<br></br>";
  echo "That is Correct!";
}else {
    echo "<br></br>";
    echo "<br></br>";
      echo "Sorry Wrong Answer";
  }
  echo "<br></br>";
  echo "<br></br>";

if($_SESSION["questions"][$index - 1]["correctAnswer"] == $answer){
  $_SESSION["score"] += 1;
  echo "YOUR SCORE IS " .$_SESSION["score"];
}else {
  echo "YOUR SCORE IS " . $_SESSION["score"];
}
echo "<br></br>";
echo "<br></br>";
// if($_SESSION['counter'] >10) {
  // echo "Your Final Score Is" . $_SESSION["score"];
// }
// var_dump ($_POST["correct"]);
//put the answers in an array ro shuffle them
if ($_SESSION["counter"] > 10) {
  redirect();
}

$choices = [
  $_SESSION['questions'][$index]["correctAnswer"],
  $_SESSION['questions'][$index]["firstIncorrectAnswer"],
  $_SESSION['questions'][$index]["secondIncorrectAnswer"],
];
shuffle($choices);

// var_dump( $_SESSION['questions'][$index]['correctAnswer']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo "$pageTitle";?> </title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">

            <p class="breadcrumbs"> <?php echo "Question Number "  . $_SESSION["counter"] . " of " . "10"; ?>
            <p class="quiz"><?php echo "What is " . $_SESSION['questions'][$index]["leftAdder"] . " + " . $_SESSION['questions'][$index]["rightAdder"];?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="0"/>
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[0];?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[1];?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $choices[2];?>" />
            </form>
            <?php
            if($_SESSION['counter'] ==10) {
              session_destroy();
            } ?>
        </div>
    </div>

</body>
</html>
