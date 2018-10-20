<?php
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>
<div>

<h1>Scripture Resources</h1>

<?php

$statement = $db->prepare("SELECT id, name FROM job_name");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['id'] . ' ' . $row['name'] . ':';
	//echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
	echo '</p>';
}
?>