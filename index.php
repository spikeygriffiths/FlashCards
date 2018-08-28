<?php
include "database.php";
include "header.php";   # Has other includes as well as log-out detection, and favicon.  NB Has "<html><head>" for favicon link!
echo "</head><body>";
echo "<center>";
echo "<h3>Folk Dancing</h3><h1>Flash Cards!</h1>";
echo "<br>";
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/AllCards.php'\">All Cards</button><br><br>";
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/RandomCard.php'\">Random Card</button><br><br>";
echo "</body></html>";
?>
