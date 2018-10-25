<?php
require("db/dbConnect.php");
$db = get_db();

$jNumber = $_POST['jNumber'];
$jName = $_POST['jName'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$DEFAULT = 'DEFAULT';



$query = 'INSERT INTO job_name(id, name) VALUES(:DEFAULT, :jName)';
$statement = $db->prepare($query);

$statement->bindValue(':jName', $jName);
$statement->bindValue(':DEFAULT', $DEFAULT);
$statement->execute();

/*$query = 'INSERT INTO job_number(id, number) VALUES(DEFAULT, :jNumber)';
$statement = $db->prepare($query);

$statement->bindValue(':jName', $jName);*/

header("Location: joblist.php");
?>