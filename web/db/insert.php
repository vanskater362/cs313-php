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

/*$query = 'INSERT INTO job_number(id, number) VALUES(DEFAULT, :jNumber)';
$statement = $db->prepare($query);

$statement->bindValue(':jName', $jName);*/

header("Location: ../joblist.php");
?>