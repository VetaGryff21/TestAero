<?php 

$servername = "localhost";
$username = "root";
$password = "newpassword";
$dbname = "aero";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br />";

$sql = "CREATE DATABASE IF NOT EXISTS aero DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br />";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE IF NOT EXISTS academy
					(user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(80) NOT NULL,
                    phone int(11) NOT NULL,
					mail VARCHAR(40) NOT NULL,
					birthday DATE NOT NULL,
                    comment VARCHAR(120)				
                    )";

if ($conn->query($sql) === TRUE) {
    echo "Table academy created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

# $usernameErr = $emailErr = $birthdayErr = $phoneErr = $commentErr = "";
# $username = $email = $birthday = $phone = $comment = "";

$counterFun = 0;

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
		$counterFun = $counterFun + 1;
		# TODO: add info to sql table
		# $usernameErr = "Ok, 'username' was entered into the database"; 
	}
} else {
	$usernameErr = "'username' field is empty"; 
}

echo "$usernameErr <br />";


if(!empty($_POST["email"])) {
	$email = clear_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	} else {
		$counterFun = $counterFun + 1;
		# TODO: add info to sql table
		# $emailErr = "Ok, 'email' was entered into the database";
	}
} else {
	$emailErr = "'email' field is empty";
}

echo "$emailErr <br />";


if (!empty($_POST["comment"])) {
    $comment = test_input($_POST["comment"]);
	# TODO: add info to sql table
	# $commentErr = "Ok, 'comment' was entered into the database";
} else {
	$comment = "-";
}
$counterFun = $counterFun + 1;


if(!empty($_POST["phone"])) {
	$phone = clear_input($_POST["phone"]);
	if ( strlen($phone) != 11) {
		$phoneErr = "Invalid phone format (less than 11 digits)"; 
	} else {
		$counterFun = $counterFun + 1;
		# TODO: add info to sql table
		# $emailErr = "Ok, 'phone' was entered into the database"; 
	}
} else {
	$phoneErr = "'phone' field is empty"; 
}

echo "$phoneErr <br />";

if (!empty($_POST["birthday"])) {
	$test_data = preg_replace('/[^0-9\.]/u', '', clear_input($_POST['birthday']));
	$test_data_ar = explode('.', $test_data);
	if(@checkdate($test_data_ar[1], $test_data_ar[0], $test_data_ar[2])) {
		$birthday = date("Y-m-d", strtotime($_POST["birthday"]));
		$counterFun = $counterFun + 1;
		# TODO: add info to sql table
		# $emailErr = "Ok, 'birthday' was entered into the database"; 
	} else {
		$birthdayErr = "Invalid birthday format"; 
	}
}

echo "$birthdayErr <br />";


if ($counterFun == 5) {
	$sql = "INSERT INTO academy (username, phone, mail, birthday, comment)
						VALUES ($username, $phone, $email, $birthday, $comment)";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
echo "$counterFun <br />";


$conn->close();
?>
