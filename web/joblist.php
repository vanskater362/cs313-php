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
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>   
    <link rel="stylesheet" href="styles.css"/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
	<title>Job List</title>
</head>

<body>

<div class="container">
      <div class="masthead">
        <h3 class="text-muted">Job List</h3>
       <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="assignments.html">Assignments</a></li>
            <li><button id="createBTN" onclick="showCreate()" type="button">Create New Job</button>
            <li><button id="searchBTN" onclick="showSearch()" type="button">Search</button>
          </ul>
        </nav>
      </div>
<div>

<div class="row" style="background: lightblue">
   <hr>
<?php

$statement = $db->prepare("SELECT job_number.number, job_name.name FROM job_name INNER JOIN job_number ON job_number.name=job_name.id");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
   echo '<ul>';
	echo '<li><strong>' . $row['number'] . ' ' . $row['name'];
   echo '</ul><hr>';
}
?>
</div>
<!-- may need to move the location of this when the list gets longer -->
<div class="row">
<div class="col-lg-4" id="createNew" style="background: lightgreen">
   <h1>Create new Job</h1>
   <hr>
   <form id="nform" method="post" action="#">
      <p id="np">
      <label id="nlabel" placeholder="Job Number" for="number">Job Number: </label>
      <input id="ninput" type="text" name="jobNumber">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="Job Name" for="name">Job Name:</label>
      <input id="ninput" type="text" name="name">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="street" for="street">Street:</label>
      <input id="ninput" type="text" name="street">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="City" for="city">City:</label>
      <input id="ninput" type="text" name="city">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="Texas" for="State">State:</label>
      <input id="ninput" type="text" name="state">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="76100" for="zip">Zip:</label>
      <input id="ninput" type="text" name="zip">
      </p>
      <input type="submit" name="submit" value="Add Job">
   </form>
</div>
<div class="col-lg-4" id="search" style="background: lightgreen">
   <h1>Search Jobs</h1>
   <hr>
   <form id="nform" method="post" action="#">
      <p id="np">
      <label id="nlabel" placeholder="Job Number" for="number">Job Number: </label>
      <input id="ninput" type="text" name="jobNumber">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="Job Name" for="name">Job Name:</label>
      <input id="ninput" type="text" name="name">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="street" for="street">Street:</label>
      <input id="ninput" type="text" name="street">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="City" for="city">City:</label>
      <input id="ninput" type="text" name="city">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="Texas" for="State">State:</label>
      <input id="ninput" type="text" name="state">
      </p>
      <p id="np">
      <label id="nlabel" placeholder="76100" for="zip">Zip:</label>
      <input id="ninput" type="text" name="zip">
      </p>
      <input type="submit" name="search" value="Search">
   </form>
</div>
</div>
</body>
