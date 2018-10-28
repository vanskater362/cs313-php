<?php
require("dbConnect.php");
$db = get_db();

$number_id = htmlspecialchars($_POST['number_id']);
$name_id = htmlspecialchars($_POST['name_id']);
$note_text = htmlspecialchars($_POST['note_text']);


$query = 'INSERT INTO notes(user_id, number_id, name_id, note_text) VALUES(1, :number_id, :name_id, :note_text)';
$statement = $db->prepare($query);

$statement->bindValue(':number_id', $number_id, PDO::PARAM_INT);
$statement->bindValue(':name_id', $name_id, PDO::PARAM_INT);
$statement->bindValue(':note_text', $note_text, PDO::PARAM_STR);
$statement->execute();

$new_page = "../details.php?jNameID=$name_id";
header("Location: $new_page");
die();
?>