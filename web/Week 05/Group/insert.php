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

$book = $_POST['bookText'];
$chapter = $_POST['chapText'];
$verse = $_POST['verseText'];
$content = $_POST['contentText'];
$topics = $_POST['topics'];

$statement = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content");

$statement->bindValue(':book', $book);
$statement->bindValue(':chapter', $chapter);
$statement->bindValue(':verse', $verse);
$statement->bindValue(':content', $content);
$statement->execute();

$statement = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo '<p>';
	echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
	echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
	echo '</p>';
}
?>