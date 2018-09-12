<?php
include "database.php";
include "header.php";
echo "</head><body><center>";
$group = $_GET['group'];
$db = DatabaseInit();
if ($db) {
    $numCards = GetCardCount($db);
    $cardId = rand(1, $numCards);
    if ($group != "") {
        while (GetGroup($cardId, $db) != $group) {
            $cardId = rand(1, $numCards);  // Keep trying until we find a card in the right group
        }
    }
    //echo "Found ",GetTitle($cardId, $db)," from ",GetGroup($cardId, $db),"<br>"; // Useful debugging
    echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/ShowTitle.php\?cardId=",$cardId,"\"/>"; // Automatically display title page
}
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";
?>
