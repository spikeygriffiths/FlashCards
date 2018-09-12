<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "database.php";

echo "<html><body>";
$title = $_POST["title"];  // Get new card title from form
$cardId = $_GET['cardId'];

$db = DatabaseInit();
if ($db) {
    if ($cardId != -1) {
        if ($title != "") {
            $db->exec("UPDATE cards SET title=\"".$title."\" WHERE card_id=".$cardId); # Update existing card
            echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/ShowDesc.php\?cardId=",$cardId,"\"/>"; # Automatically re-display description
        } else {
            $db->exec("DELETE FROM cards WHERE card_id=".$cardId);  # Remove empty card
            echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/index.php\"/>"; # Automatically go back to index
        }
    } else {
        $db->exec("INSERT INTO cards (title) VALUES(\"".$title."\")");  # Add new card
        echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/index.php\"/>"; # Automatically go back to index
    }
}
echo "<a href=\"/flashcards/index.php\">Home</a>"; # Shouldn't be needed
echo "</body></html>";
?>
