<?php

session_start();



echo "Game Over";
echo "<br></br>";
echo "<br></br>";
echo "YOUR SCORE IS " .$_SESSION["score"] . " OUT OF 10";


session_destroy();

?>
