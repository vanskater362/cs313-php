<?php
require("dbConnect.php");
$db = get_db();


$jNumber = $_POST['jNumber'];
$jName = $_POST['jName'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$DEFAULT = 'DEFAULT';



$query = 'INSERT INTO job_name (name) VALUES(:jName)';
$statement = $db->prepare($query);

$statement->bindValue(':jName', $jName);
$statement->execute();

$jNameID = $db->lastInsertId("job_name_id_seq");

$query = 'INSERT INTO job_number(number, name) VALUES(:jNumber, :jNameID)';
$statement = $db->prepare($query);

$statement->bindValue(':jNumber', $jNumber);
$statement->bindValue(':jNameID', $jNameID);

header("Location: ../joblist.php");
?>