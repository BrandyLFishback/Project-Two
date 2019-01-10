<?php
 include ("inc/questions.php");
include ("index.php")
// Generate random questions

foreach ($questions as $question) {
  echo "leftAdder" $_POST ["leftAdder"] . "rightAdder" $_POST ["rightAdder"] .
        "correctAnswer" $_POST ["correctAnswer"]
        "firstIncorrectAnswer" $_POST ["firstIncorrectAnswer"]
        "secondIncorrectAnswer" $_POST ["secondIncorrectAnswer"];
  // code...
}

$answer1 = $_POST["answer"];


if ($_POST["answer"] == "$questions, correctAnswer") {
    echo "Correct Answer!";
} else {
    echo "Incorrect Answer";
}

// Loop for required number of questions


//foreach ($random as $questions)


// code...
// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array
