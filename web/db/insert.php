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

echo "Name: $jName ";
echo "jNameID: $jNameID ";
echo "jNumber: $jNumber ";

$query = 'INSERT INTO job_number(number, name) VALUES(:jNumber, :jNameID)';
$statement = $db->prepare($query);

$statement->bindValue(':jNumber', $jNumber);
$statement->bindValue(':jNameID', $jNameID);
$statement->execute();

$jNumberID = $db->lastInsertId("job_number_id_seq");

echo "Street: $street ";
echo "City: $city ";
echo "State: $state ";
echo "Zip: $zip ";
echo "jNumberID: $jNumberID ";

$query = 'INSERT INTO address(street, city, state, zip, number_id) VALUES(:street, :city, :state, :zip, :number_id)';
$statement = $db->prepare($query);

$statement->bindValue(':street', $street);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':number_id', $jNumberID);
$statement->execute();

$addressID = $db->lastInsertId("address_id_seq");
echo "AddressID: $addressID ";

//header("Location: ../joblist.php");
?>