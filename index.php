<!DOCTYPE html>
<?php
 include ("inc/questions.php");
 session_start();

$pageTitle = "Math Quiz: Addition";

$_SESSION["score"] = 0;
// if (!isset($_SESSION["score"])){
//   $_SESSION["score"] = 0;
// }
// var_dump($_POST);

if ((isset($_SESSION["score"]) && $_SESSION["score"] == $choices[0]["correctAnswer"])){
  $_SESSION["score"] += 1;
}

// var_dump($_SESSION);

// echo $_SESSION["score"];

$buttons_array[] = [<input type="submit" class="btn" name="answer1" value="<?php echo $choices[0];?>" />];
$buttons_array[] = [<input type="submit" class="btn" name="answer2" value="<?php echo $choices[1];?>" />];
var_dump($buttons_array);
/*if (isset( $_POST[$choices]['correctAnswer'] ) ) {
  echo 'correct';
} elseif (isset( $_POST[$choices]['firstIncorrectAnswer'] ) ) {
      echo 'incorrect';
} elseif (isset( $_POST[$choices]['secondIncorrectAnswer'] ) ) {
      echo 'incorrect';
}*/

$rand = array_rand($questions,1);
shuffle($questions);

$correct = $questions[0]["correctAnswer"];
$firstIncorrect = $questions[0]["firstIncorrectAnswer"];
$secondIncorrect = $questions[0]["secondIncorrectAnswer"];
$choices = [$correct , $firstIncorrect, $secondIncorrect];
// $choices = [$questions[0]["correctAnswer"],$questions[0]["firstIncorrectAnswer"], $questions[0]["secondIncorrectAnswer"]];
shuffle($choices);

var_dump ($correct);
if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] >9)){
  $_SESSION["counter"] = 1;
} else {
    $_SESSION["counter"] += 1;
}

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
            <p class="quiz"><?php echo "What is " . $questions[0]["leftAdder"] . " + " . $questions[0]["rightAdder"];?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="0"/>
                <input type="submit" class="btn" name="answer1" value="<?php echo $choices[0];?>" />
                <input type="submit" class="btn" name="answer2" value="<?php echo $choices[1];?>" />
                <input type="submit" class="btn" name="answer3" value="<?php echo $choices[2];?>" />
            </form>

        </div>
    </div>
</body>
</html>
