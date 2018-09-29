<?php
$date = date('l, F jS, Y');
print("
<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>

    <link rel=\"icon\" href=\"../../favicon.ico\">

    <title>Personal Homepage</title>
  </head>

  <body>

    <div class=\"container\">
      <div class=\"masthead\">
        <h3 class=\"text-muted\">Anthony Wagner's Personal Page</h3>
       <nav>
          <ul class=\"nav nav-justified\">
            <li class=\"active\"><a href=\"index.html\">Home</a></li>
            <li><a href=\"assignments.html\">Assignments</a></li>
            <li><a href=\"content\files\Anthony Wagner Resume.pdf\">Resume</a></li>
            <li><a href=\"mailto:vanskater362@gmail.com\">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class=\"jumbotron\">
         <div class=\"row\">
            <div class=\"col-sm-4\">
               <img src=\"content\images\profile.jpg\" class=\"img-circle\"/>
            </div>
            <div class=\"col-md-8\">
               <h1>Anthony Wagner</h1>
               <p class=\"lead\">Husband, Father of two, Gamer, Athlete</p>
            </div>
         </div>
      </div>

      <div class=\"row\">
        <div class=\"col-lg-4\">
          <h2>About Me</h2>
          <p>I am currently enrolled in a computer programing degree at Brigham Young University - Idaho. I only have three semesters left before I finish!</p>
          <p>I currently work full time as a coded systems designer in the Fire Alarm indurstry and I am going to school to make a career change to hopfully bring a better life for my family.</p>

        </div>
        <div class=\"col-lg-4\">
          <h2>Hobbies</h2>
          <ol>
            <li>Cycling</li>
            <li>Computer Gaming</li>
            <li>Magic the Gathering</li>
            <li>Automotive Work</li>
          </ol>

       </div>
        <div class=\"col-lg-4\">    
            <h2>PHP Section</h2>
            <p>$date</p>
        </div>
      </div>
    </div>
  </body>
</html>")
?>
