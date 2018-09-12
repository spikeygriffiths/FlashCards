<?php
include "database.php";
include "header.php";   # Has other includes as well.  NB Has "<html><head>" for favicon link!
echo "</head><body>";
echo "<center>";
echo "<h3>Folk Dancing</h3><h1>Flash Cards!</h1>";
echo "<br>";
$db = DatabaseInit();
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/RandomCard.php'\"><b>Random Card</b></button><br><br>";
ShowGroups($db);
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/AllCards.php'\">Every Card</button><br><br>";
echo "</body></html>";

function ShowGroups($db)
{
    $groupList = array("");
    $sth = $db->prepare("SELECT grouping FROM cards");
    $sth->execute();
    while ($row =  $sth->fetch()) {
        $group = $row['grouping'];
        if (in_array($group, $groupList)) {} else {
             $groupList[] = $group;
             echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/RandomCard.php/?group=",$group,"'\">Random Card from ",$group,"</button><br><br>";
        }
    }
}
?>
