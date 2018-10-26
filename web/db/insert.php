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

echo "jNameID: $jNameID";

$query = 'INSERT INTO job_number(number, name) VALUES(:jNumber, :jNameID)';
$statement = $db->prepare($query);

$statement->bindValue(':jNumber', $jNumber);
$statement->bindValue(':jNameID', $jNameID);
$statement->execute();

$jNumberID = $db->lastInsertId("job_number_id_seq");

echo "Street: $jNameID\n";
echo "City: $jNameID\n";
echo "State: $jNameID\n";
echo "Zip: $jNameID\n";
echo "jNumberID: $jNumberID\n";

$query = 'INSERT INTO address(street, city, state, zip, number_id) VALUES(:street, :city, :state, :zip :number_id)';
$statement = $db->prepare($query);

$statement->bindValue(':street', $street);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':number_id', $jNumberID);
$statement->execute();

header("Location: ../joblist.php");
?>