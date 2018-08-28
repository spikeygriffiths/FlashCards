<?php
include "database.php";
include "header.php";
echo "</head><body><center>";
$db = DatabaseInit();
if ($db) {
    $numCards = GetCardCount($db);
    $cardId = rand(1, $numCards);
    echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/ShowTitle.php\?cardId=",$cardId,"\"/>"; # Automatically display title page
}
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";
?>
