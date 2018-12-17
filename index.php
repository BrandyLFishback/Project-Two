<!DOCTYPE html>
<?php
 include ("inc/questions.php");
//$q = $_GET["q"];
//echo $q;
$pageTitle = "Math Quiz: Addition";
//var_dump ($_POST);
//echo "<br>";
//var_dump ($_GET);
if ( isset( $_POST['answer1'] ) ) {
  echo 'correct';
} elseif ( isset( $_POST['answer2'] ) ) {
      echo 'incorrect';
} elseif ( isset( $_POST['answer3'] ) ) {
      echo 'incorrect';
}

$questionsCount = 0;
if($questions[0]['correctAnswer']){
//increments the question for each one they have right
   $questionsCount++;
}
var_dump ($questionsCount);
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

            <p class="breadcrumbs"> <?php echo "Question Number "  .  "$questionsCount " . "of " . "10"; ?>
            <p class="quiz"><?php echo "What is " . $questions[0]["leftAdder"] . " + " . $questions[0]["rightAdder"];?></p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="0"/>
                <input type="submit" class="btn" name="answer1" value="<?php echo $questions[0] ["correctAnswer"];?>" />
                <input type="submit" class="btn" name="answer2" value="<?php echo $questions [0]["firstIncorrectAnswer"];?>" />
                <input type="submit" class="btn" name="answer3" value="<?php echo $questions[0] ["secondIncorrectAnswer"];?>" />
            </form>
        </div>
    </div>
</body>
</html>
