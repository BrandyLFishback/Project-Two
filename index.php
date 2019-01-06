<!DOCTYPE html>
<?php
 include ("inc/questions.php");
 session_start();

$pageTitle = "Math Quiz: Addition";


// if (isset($_SESSION["correctAnswer"]) && isset($_POST[$_SESSION["correctAnswer"]])) {
//     $_SESSION["score"] += 1;

// if (!isset($_SESSION["score"])) {
//     $_SESSION["score"] = 0;

//shuffle questions and hold them in $_SESSION Variable
if(!$_SESSION) {
  shuffle($questions);
  $_SESSION['questions'] = $questions;
}

//keep track of what question the quiz is on
if ((!isset($_SESSION["counter"]) || $_SESSION["counter"] >9)){

  $_SESSION["counter"] = 1;

} else {
    $_SESSION["counter"] += 1;
}

/*need to find something that's == $_SESSION['questions'][$index]["correctAnswer"]*/
//set the counter to 0
$index = $_SESSION["counter"] - 1;

//put the answers in an array ro shuffle them
$choices = [
  $_SESSION['questions'][$index]["correctAnswer"],
  $_SESSION['questions'][$index]["firstIncorrectAnswer"],
  $_SESSION['questions'][$index]["secondIncorrectAnswer"],
];
shuffle($choices);

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
                <input type="submit" class="btn" name="answer1" value="<?php echo $choices[0];?>" />
                <input type="submit" class="btn" name="answer2" value="<?php echo $choices[1];?>" />
                <input type="submit" class="btn" name="answer3" value="<?php echo $choices[2];?>" />
            </form>
            <?php
            if($_SESSION['counter'] == 10) {
              session_destroy();
            } ?>
        </div>
    </div>

</body>
</html>
