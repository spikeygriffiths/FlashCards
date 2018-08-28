<?php
include "database.php";
include "header.php";
$cardId = $_GET['cardId'];
echo "</head><body><center>";
$db = DatabaseInit();
if ($db) {
    $title = GetTitle($cardId, $db);
    $desc = GetDesc($cardId, $db);
    echo "<h1>",$title,"</h1><br>";
    echo "<h2>",$desc,"</h2><br>";
}
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/edit_card.php/?cardId=",$cardId,"'\">Edit</button><br>";
echo "<br><button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";
?>
