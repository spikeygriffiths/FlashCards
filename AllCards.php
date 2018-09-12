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
    $ids = [];
    $titles = [];
    $groups = [];
    $index = 0;
    $sth = $db->prepare("SELECT card_id, title, grouping FROM cards");
    $sth->execute();
    while ($row =  $sth->fetch()) {
        $ids[$index] = $row['card_id'];
        $titles[$index] = $row['title'];
        if (in_array($row['grouping'], $groups)) {} else { $groups[] = $row['grouping']; }  // Get each unique group name
        $index++;
    }
    for ($idx = 0; $idx < count($groups); $idx++) {
        ShowGroupCards($groups[$idx], $ids, $titles, $db);
    }
    //ShowGroupCards("", $ids, $titles, $db);
    echo "<br><br>";
    echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/edit_card.php/?cardId=-1'\">Add new card</button>";
    echo "<br><br>";
}

function ShowGroupCards($group, $ids, $titles, $db)
{
    if ($group != "") {
        echo "<h3>",$group,"</h3>";
    } else {
        echo "<h3>(No group name)</h3>";
    }
    $numCards = count($ids);
    for ($idx = 0; $idx < $numCards; $idx++) {
        //echo $titles[$idx],"(",GetGroup($ids[$idx], $db),")&nbsp";  // Debugging
        if (GetGroup($ids[$idx], $db) == $group) {
            echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/ShowTitle.php/?cardId=",$ids[$idx],"'\">",$titles[$idx],"</button>&nbsp&nbsp&nbsp";
        }
    }
    echo "<br>";
}
?>
