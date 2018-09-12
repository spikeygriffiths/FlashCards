<?php
include "database.php";
include "header.php";   # Has other includes as well as favicon.  NB Has "<html><head>" for favicon link!
$cardId = $_GET['cardId'];
echo "</head><body>";
$db = DatabaseInit();
echo "<center>";
echo "<h1>Edit Card</h1>";
EditCard($db, $cardId);
echo "<button class=\"button\" type=\"button\" onclick=\"window.location.href='/flashcards/index.php'\">Home</button>";
echo "</body></html>";

function EditCard($db, $cardId)
{
    if ($cardId != -1) {
        $title = GetTitle($cardId, $db);
        $desc = GetDesc($cardId, $db);
        $group = GetGroup($cardId, $db);
    } else {
        $title = "New card title...";
        $desc = "Description...";
        $group = "Group name....";
    }
    echo "<b>Title</b><form action=\"/flashcards/save_title.php/?cardId=", $cardId, "\" method=\"post\">";
    echo "<input type=\"text\" size=\"40\" name=\"title\" value=\"", $title, "\">";
    echo "<input type=\"submit\" value=\"Update\"></form>";
    echo "(NB A blank title will remove the record from the database)<br><br>";
    echo "<b>Group</b><form action=\"/flashcards/save_group.php/?cardId=", $cardId, "\" method=\"post\">";
    echo "<input type=\"text\" size=\"40\" name=\"group\" value=\"", $group, "\">";
    echo "<input type=\"submit\" value=\"Update\"></form>";
    echo "<b>Description</b><form action=\"/flashcards/save_desc.php/?cardId=", $cardId, "\" method=\"post\">";
    echo "<textarea id=\"desc\" rows=\"10\" cols=\"100\" wrap=\"hard\" name=\"desc\">", $desc, "</textarea>";
    echo "<input type=\"submit\" value=\"Update\">";
    echo "</form>";
    echo "Top tip - use HTML formatting for the description section<br><br>";
}
?>
