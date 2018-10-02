<html>
    <head>
        <title>Week 3 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, intitial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="form_style.css"> 
    </head>
    <body>  
    <form method="post" action="student.php">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email">
            <br>
            <br>
            <label for="major">Major:</label>
            <br>
            <input type="radio" name="major" value="web design and development">Web Design and Development<br>
            <input type="radio" name="major" value="computer information technology">Computer Information Technology<br>
            <input type="radio" name="major" value="computer engineering">Computer Engineering<br>
            <label for="comment">Comments:</label>
            <textarea rows="4" cols="50" name="comment"></textarea>
            <br>
            <br>
            <label for="continent">What continents have you visited?</label><br>
            <input type="checkbox" name="continent[]" value="North America">North America<br>
            <input type="checkbox" name="continent[]" value="South America">South America<br>
            <input type="checkbox" name="continent[]" value="Europe">Europe<br>
            <input type="checkbox" name="continent[]" value="Asia">Asia<br>
            <input type="checkbox" name="continent[]" value="Australia">Australia<br>
            <input type="checkbox" name="continent[]" value="Africa">Africa<br>
            <input type="checkbox" name="continent[]" value="Antarctica">Antarctica<br>
            <input type="submit" name="submit"> 
        </form>
    </body>
</html>

