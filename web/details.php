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
   <?php
      require("db/dbConnect.php");
      $db = get_db();

      $jNameID = htmlspecialchars($_GET['jNameID']);

      echo "jNameID = " . $jNameID;

      $statement = $db->prepare("SELECT job_number.number, job_name.name, job_name.id FROM job_name INNER JOIN job_number ON job_number.name=:jNameID");
      $statement->bindValue(':jNameID', $jNameID);
      $statement->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $jNumber = $rows[0]['number'];
      $jName = $rows[0]['name'];
   ?>

<div class="container">
      <div class="masthead">
        <h3 class="text-muted"><?php echo $jNumber . ' - ' . $jName . ' ';?>Details</h3>
       <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="assignments.html">Assignments</a></li>
            <li><a href="joblist.php">Job List</a></li>
          </ul>
        </nav>
      </div>

</div>
</body>
</html>