<html>
   <body>
        Information for : <?php echo $_POST["name"]; ?><br>
        Your email address is: <?php echo $_POST["email"]; ?><br>
        Your Major is : <?php echo $_POST["major"]; ?><br>
        You commented : <?php echo $_POST["comment"]; ?><br>
        You have visited : <?php
        if (isset($_POST["submit"])){
            foreach($_POST["continent"] as $selected) {
            echo $selected;
            echo " ";
            }
        }       
        ?><br>
        
    </body>
</html>
