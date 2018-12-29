<!DOCTYPE html>
<?php
 include ("inc/questions.php");
 session_start();

$pageTitle = "Math Quiz: Addition";

$correctAnswer =  $questions[0]["correctAnswer"];

  // echo $_SESSION["score"];
$rand = array_rand($questions,1);
shuffle($questions);

if (isset($_SESSION["correctAnswer"]) && isset($_POST[$_SESSION["correctAnswer"]])) {
    $_SESSION["score"] += 1;
}

if (!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
    $_SESSION["counter"] = 0;
    shuffle($questions);
    $_SESSION["questions"] = $questions;
}

echo "score = " . $_SESSION["score"];

//
// //Get next question
// $currQuestion = array_pop($_SESSION["questions"]);
// $_SESSION["correctAnswer"] = $currQuestion["correctAnswer"];


$choices = [
  $questions[0]["correctAnswer"],
  $questions[0]["firstIncorrectAnswer"],
  $questions[0]["secondIncorrectAnswer"],
];
shuffle($choices);

if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] >9)){
  $_SESSION["counter"] = 1;
} else {
    $_SESSION["counter"] += 1;
}


$questions[$_SESSION["counter"] - 1];
$counter++;

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
