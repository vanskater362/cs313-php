<?php
require("dbConnect.php");
$db = get_db();

$number_id = $_POST['number_id'];
$name_id = $_POST['name_id'];
$note_text = $_POST['note_text'];


$query = 'INSERT INTO notes(user_id, number_id, name_id, note_text) VALUES(1, :number_id, :name_id, :note_text)';
$statement = $db->prepare($query);

$statement->bindValue(':number_id', $number_id);
$statement->bindValue(':name_id', $name_id);
$statement->bindValue(':note_text', $note_text);
$statement->execute();

header("Location: ../details.php?jNameID=");
die();
?>