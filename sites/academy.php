<?php 

# $usernameErr = $emailErr = $birthdayErr = $phoneErr = $commentErr = "";
# $username = $email = $birthday = $phone = $comment = "";

function clear_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!empty($_POST["username"]))
{
	$username = clear_input($_POST["username"]);
	if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
	    $usernameErr = "Invalid characters was entered into the 'username' field"; 
	} else {
		# TODO: add info to sql table
		# $usernameErr = "Ok, 'username' was entered into the database"; 
	}
} else {
	$usernameErr = "'username' field is empty"; 
}

echo "$usernameErr <br />";

?>
