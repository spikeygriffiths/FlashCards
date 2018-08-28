<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "database.php";

echo "<html><body>";
$desc = $_POST['desc']; // Get card description from other form
$cardId = $_GET['cardId'];

$db = DatabaseInit();
if ($db) {
    if ($cardId != -1) {
        $query = "UPDATE cards SET description=\"".$desc."\" WHERE card_id=".$cardId; # Update existing card
    } else {
        $query = "INSERT INTO cards (description) VALUES(\"".$desc."\")";  # Add new card
    }
    echo "Sending ",$query, " to DB<br>";
    $count = $db->exec($query);
}
echo "<meta http-equiv=\"refresh\" content=\"0;url=/flashcards/ShowDesc.php\?cardId=",$cardId,"\"/>"; # Automatically re-display description
echo "<a href=\"/flashcards/index.php\">Home</a>"; # Shouldn't be needed
echo "</body></html>";
?>
