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
            $query = "UPDATE cards SET title=\"".$title."\" WHERE card_id=".$cardId; # Update existing card
        } else {
            $query = "DELETE FROM cards WHERE card_id=".$cardId;  # Remove empty card
        }
    } else {
        $query = "INSERT INTO cards (title) VALUES(\"".$title."\")";  # Add new card
    }
    echo "Sending ",$query, " to DB<br>";
    $count = $db->exec($query);
}
echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/ShowDesc.php\?cardId=",$cardId,"\"/>"; # Automatically re-display description
echo "<a href=\"/flashcards/index.php\">Home</a>"; # Shouldn't be needed
echo "</body></html>";
?>
