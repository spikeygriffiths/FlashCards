<?php
// database.php
session_start();

function DatabaseInit()
{
    $dir = "sqlite:flashcards.db";
    $db = new PDO($dir) or die("Cannot open database");
    return $db;
}

function GetCount($table, $db)
{
    $result = $db->query("SELECT COUNT(*) FROM ".$table);
    if ($result != null) {
        return $result->fetchColumn();
    }
    return null;
}

function GetCardCount($db)
{
    return GetCount("cards", $db);
}

function GetTitle($cardId, $db)
{
    $sth = $db->prepare("SELECT title FROM cards where card_id=\"".$cardId."\"");
    $sth->execute();
    $row = $sth->fetch();
    if ($row != null) {
        return $row['title'];
    }
    return "Card not found";
}

function GetGroup($cardId, $db)
{
    $sth = $db->prepare("SELECT grouping FROM cards where card_id=\"".$cardId."\"");
    $sth->execute();
    $row = $sth->fetch();
    if ($row != null) {
        return $row['grouping'];
    }
    return "Card not found";
}

function GetDesc($cardId, $db)
{
    $sth = $db->prepare("SELECT description FROM cards where card_id=\"".$cardId."\"");
    $sth->execute();
    $row = $sth->fetch();
    if ($row != null) {
        return $row['description'];
    }
    return "Card not found";
}

function AddCard($title, $desc, $db)
{
    $db->exec("INSERT INTO cards (title, description) VALUES (\"".$title."\",\"".$desc."\")");
}

?>
