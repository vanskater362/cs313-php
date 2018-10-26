<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>   
    <link rel="stylesheet" href="styles.css"/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
	<title>Job Details</title>
</head>

<body>

<div class="container">
      <div class="masthead">
        <h3 class="text-muted">Job Details</h3>
       <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="assignments.html">Assignments</a></li>
            <li><a href="joblist.php">Job List</a></li>
          </ul>
        </nav>
      </div>
<div>

<?php
require("dbConnect.php");
$db = get_db();

session_start();
echo 'number: ' . $_SESSION['number'];
?>