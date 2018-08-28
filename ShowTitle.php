<?php
include "database.php";
include "header.php";
$cardId = $_GET['cardId'];
echo "</head><body><center>";
$db = DatabaseInit();
if ($db) {
    $title = GetTitle($cardId, $db);
    echo "<a href=\"/flashcards/ShowDesc.php/?cardId=",$cardId,"\"><h1 style=\"font-size:16vw;\">",$title,"</h1></a><br>";
}
#echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/ShowDesc.php/?cardId=",$cardId,"'\">Description</button><br>";
echo "<br><button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";
?>
