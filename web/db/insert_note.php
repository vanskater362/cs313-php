<?php
require("db/dbConnect.php");
$db = get_db();

$name_id = htmlspecialchars($_POST['name_id']);
$userID = htmlspecialchars($_POST['userID']);
$note_text = htmlspecialchars($_POST['note_text']);

$statement = $db->prepare("SELECT id FROM job_number WHERE name=:jNameID");
$statement->bindValue(':jNameID', $name_id, PDO::PARAM_INT);
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
$jNumberID = $rows[0]['id'];


$query = 'INSERT INTO notes(user_id, number_id, name_id, note_text) VALUES(:userID, :number_id, :name_id, :note_text)';
$statement = $db->prepare($query);

$statement->bindValue(':userID', $userID, PDO::PARAM_INT)
$statement->bindValue(':number_id', $jNumberID, PDO::PARAM_INT);
$statement->bindValue(':name_id', $name_id, PDO::PARAM_INT);
$statement->bindValue(':note_text', $note_text, PDO::PARAM_STR);
$statement->execute();
//echo $userID;
$new_page = "../details.php?jNameID=$name_id";
header("Location: $new_page");
die();
?>