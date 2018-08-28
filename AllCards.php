<?php
include "database.php";
include "header.php";   # Has other includes as well as favicon.  NB Has "<html><head>" for favicon link!
echo "</head><body>";
$db = DatabaseInit();
echo "<center>";
echo "<h1>All Cards</h1>";
ShowCards($db);
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";

function ShowCards($db)
{
    $cardIds = [];
    $cardTitles = [];
    $index = 0;
    $sth = $db->prepare("SELECT card_id, title FROM cards");
    $sth->execute();
    while ($row =  $sth->fetch()) {
        $cardIds[$index] = $row['card_id'];
        $cardTitles[$index] = $row['title'];
        $index++;
    }
    for ($cardIdx = 0; $cardIdx < $index; $cardIdx++) {
        echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/ShowTitle.php/?cardId=",$cardIds[$cardIdx],"'\">",$cardTitles[$cardIdx],"</button>&nbsp&nbsp&nbsp";
    }
    echo "<br><br>";
    echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/edit_card.php/?cardId=-1'\">Add new card</button>";
    echo "<br><br>";
}
?>
