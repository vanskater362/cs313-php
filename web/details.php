<?php
   session_start();
   if (isset($_SESSION['username']))
   {
      $username = $_SESSION['username'];
      $userID = $_SESSION['userID'];
   }

   else
   {
      header("Location: signUp.php");
      die();
   }
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
	<title>Job Details</title>
</head>

<body>
   <?php
      require("db/dbConnect.php");
      $db = get_db();

      $jNameID = htmlspecialchars($_GET['jNameID']);

      $statement = $db->prepare("SELECT job_number.number, job_name.name FROM job_name INNER JOIN job_number ON job_number.name=job_name.id WHERE job_name.id=:jNameID");
      $statement->bindValue(':jNameID', $jNameID, PDO::PARAM_INT);
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      $jNumber = $rows[0]['number'];
      $jName = $rows[0]['name'];
   ?>

   <div class="container">
      <div class="masthead">
        <h3 class="text-muted"><?php echo $jNumber . ' - ' . $jName;?> Details </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="assignments.html">Assignments</a></li>
            <li><a href="joblist.php">Job List</a></li>
            <li><a href="signOut.php"><?php echo $username?> Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <div class="row" style="background: lightblue">
         <div class="col-lg-4" style="backgroud: white">
            <h3>Address</h3><hr>
            <?php
               $statement = $db->prepare("SELECT street, city, state, zip, name FROM address INNER JOIN job_number ON number_id=job_number.id WHERE job_number.name=:jNameID");
               $statement->bindValue(':jNameID', $jNameID, PDO::PARAM_INT);
               $statement->execute();
               $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

               echo '<p><strong>' . $rows[0]['street'] . '</p>';
               echo '<p><strong>' . $rows[0]['city'] . ', ' . $rows[0]['state'] . ' ' . $rows[0]['zip'] . '</p>';
            ?>
         </div>  
         <div class="col-lg-4">
            <h3>Notes</h3><hr>
            <?php
               $statement = $db->prepare("SELECT note_text, number_id, name FROM notes INNER JOIN job_number ON number_id=job_number.id WHERE job_number.name=:jNameID");
               $statement->bindValue(':jNameID', $jNameID, PDO::PARAM_INT);
               $statement->execute();

               echo '<ol>';
               while ($rows = $statement->fetch(PDO::FETCH_ASSOC))
                  {
	                  echo '<li id="list"><strong>' . $rows['note_text'];
                  }
               echo '</ol>';
            ?>
         </div>
            <h3>Insert Notes</h3><hr>
            <form method="post" action="db/insert_note.php">
               <input type="submit" value="Create Note">
               <input type="hidden" name="name_id" value="<?php echo $jNameID; ?>">
               <input type="hidden" name="userID" value="<?php echo $userID; ?>">
	            <textarea rows="5" cols="40" name="note_text"></textarea><br>
            </form>
         <div>
         </div>
      </div>
   </div>
</body>
</html>