<?php
require("dbConnect.php");
$db = get_db();


$jNumber = htmlspecialchars($_POST['jNumber']);
$jName = htmlspecialchars($_POST['jName']);
$street = htmlspecialchars($_POST['street']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$DEFAULT = 'DEFAULT';



$query = 'INSERT INTO job_name (name) VALUES(:jName)';
$statement = $db->prepare($query);

$statement->bindValue(':jName', $jName, PDO::PARAM_STR);
$statement->execute();

$jNameID = $db->lastInsertId("job_name_id_seq");

//echo "Name: $jName ";
//echo "jNameID: $jNameID ";
//echo "jNumber: $jNumber ";

$query = 'INSERT INTO job_number(number, name) VALUES(:jNumber, :jNameID)';
$statement = $db->prepare($query);

$statement->bindValue(':jNumber', $jNumber, PDO::PARAM_STR);
$statement->bindValue(':jNameID', $jNameID, PDO::PARAM_INT);
$statement->execute();

$jNumberID = $db->lastInsertId("job_number_id_seq");

//echo "Street: $street ";
//echo "City: $city ";
//echo "State: $state ";
//echo "Zip: $zip ";
//echo "jNumberID: $jNumberID ";

$query = 'INSERT INTO address(street, city, state, zip, number_id) VALUES(:street, :city, :state, :zip, :number_id)';
$statement = $db->prepare($query);

$statement->bindValue(':street', $street, PDO::PARAM_STR);
$statement->bindValue(':city', $city, PDO::PARAM_STR);
$statement->bindValue(':state', $state, PDO::PARAM_STR);
$statement->bindValue(':zip', $zip, PDO::PARAM_INT);
$statement->bindValue(':number_id', $jNumberID, PDO::PARAM_INT);
$statement->execute();

$addressID = $db->lastInsertId("address_id_seq");
//echo "AddressID: $addressID ";

header("Location: ../joblist.php");
die();
?>