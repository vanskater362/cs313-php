<?php
session_start();
$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['lname']) && isset($_POST['lpaw']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['lname'];
	$password = $_POST['lpaw'];
	// Connect to the DB
	require("db/dbConnect.php");
	$db = get_db();
	$query = 'SELECT password FROM public.user WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
         $_SESSION['username'] = $username;
         echo $username;
			header("Location: joblist.php");
			die(); // we always include a die after redirects.
		}
		else
		{
         echo "User not found or bad password.";
         $badLogin = true;
		}
	}
	else
	{
      echo "User not found or bad password.";
      $badLogin = true;
	}
}
?>