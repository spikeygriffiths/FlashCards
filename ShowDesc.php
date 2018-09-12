<?php
include "database.php";
include "header.php";
$cardId = $_GET['cardId'];
echo "</head><body><center>";
$db = DatabaseInit();
if ($db) {
    $title = GetTitle($cardId, $db);
    $desc = GetDesc($cardId, $db);
    $group = GetGroup($cardId, $db);
    echo "<a href=\"/flashcards/ShowTitle.php/?cardId=",$cardId,"\"><h1>",$title,"</h1></a>";
    //if ($group != "") echo "(",$group,")<br>";
    echo "<h2>",$desc,"</h2><br>";
}
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\"><b>Home</b></button>";
echo "<br><br><br><button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/edit_card.php/?cardId=",$cardId,"'\">Edit</button><br>";
echo "</body></html>";
?>
