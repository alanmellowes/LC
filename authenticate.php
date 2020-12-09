<?php

session_start();

$email = "";
$fname = "";
$lname = ""; 
$errors = array(); 

$servername = "eu-cdbr-west-03.cleardb.net";
$username = "b6d0c874bc79b5";
$password = "7cda2c8a";
$dbname  = "heroku_7e527134bf57a8d"; 
 
 
	$conn = new mysqli($servername, $username, $password, $dbname); 
 
	if($conn->connect_error){
		die("Connection failed; "  . $conn->connect_error);
	}
 
	echo "Connected successfully"; 
	if(isset($_POST['regbutton'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']); 
	$fname = mysqli_real_escape_string($conn, $_POST['fname']); 
	$lname = mysqli_real_escape_string($conn, $_POST['lname']); 
	$bday = mysqli_real_escape_string($conn, $_POST['bday']); 
	$psw = mysqli_real_escape_string($conn, $_POST['psw']);
	$psw_repeat = mysqli_real_escape_string($conn, $_POST ['psw_repeat']);
	
	if (count($errors) != 0){
		echo "error email"; 
	}
	
	if(empty($email)) {array_push($errors, "Email required"); }	
	if (count($errors) != 0){
		echo "error email"; 
	}
	if(empty($fname)) {array_push($errors, "First name required"); }
	if (count($errors) != 0){
		echo "error fname"; 
	}	
	if(empty($lname)) {array_push($errors, "Last name required"); }	
	if (count($errors) != 0){
		echo "error lname"; 
	}
	///if(empty($bday)) {array_push($errors, "Birthday required"); }	
	if(empty($psw)) {array_push($errors, "Password required"); }
		if (count($errors) != 0){
		echo "error psw"; 
	}
	///error below
	if($psw != $psw_repeat) {array_push($errors, "Passwords don't match"); }
		if (count($errors) != 0){
		echo "error psw match"; 
	}


	$user_check = "SELECT * FROM accounts WHERE email = '$email'";

	$result = mysqli_query($conn, $user_check); 

	$user = mysqli_fetch_assoc($result); 

	if($user){
		array_push($errors, "Email already in use"); 
	}
	
	/// If statement below not running
	echo count($errors); 
	if(count($errors) == 0) {
		$password = md5($psw); 
	
		$query = "INSERT INTO accounts (email, fname, lname, bday, password) VALUES('$email', '$fname', '$lname', '$bday', '$password')";  
	
		mysqli_query ($conn, $query); 
	
		$_SESSION['email'] = $email;
		$_SESSION['success'] = "Logged in"; 
		echo 'no errors';
	
		header( 'Location: /Events.php');
			
	}}
if(isset($_POST['loginButton'])){
$email = mysqli_real_escape_string($conn, $_POST['email']);	
$password = mysqli_real_escape_string($conn, $_POST['password']);
	
///error here
if(empty($email)){
	array_push($errors, "Email required"); 
	echo "email error";
}	
///errror here
if (empty($password)){
	array_push($errors, "Password required"); 
	echo "password error";
}

///not running
if(count($errors) == 0) {
	echo "0 errors"; 
	$password = md5($password); 
	
	$query = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password'";
	
	$results = mysqli_query($conn, $query); 
	
	if(mysqli_num_rows($results) == 1) {
		$_SESSION['email'] = $email; 
		$_SESSION['success'] = "Logged in."; 
		header( 'Location: /Events.php' ) ;
		echo "header not working"; 
	}
	else {
		array_push($errors, "Incorrect email/password"); 
		header( 'Location: /loginPage.php' );
	}
}
}

if(isset($_POST['locationConfirm'])){
	$location = mysqli_real_escape_string($conn, $_POST['locationSet']);
	$email = $_SESSION['email'];
	$query = "UPDATE accounts SET location = '$location' WHERE email = '$email'"; 
	$_SESSION['location'] = $location; 
	
	mysqli_query ($conn, $query); 
	
	header( 'Location: /Events.php' );
}

if(isset($_POST['createEventButton'])){
	
	$query1 = "SELECT * FROM accounts WHERE email = 'email@email.com'";
	$result = mysqli_query($conn, $query1); 
	$row = mysqli_fetch_assoc($result); 
	
	
	$location = $row["location"]; 
	
	$eventName = mysqli_real_escape_string($conn, $_POST['eventName']);
	
	$query = "INSERT INTO events (name, location) VALUES ('$eventName', '$location')";
	
	mysqli_query ($conn, $query);
	
	header( 'Location: /Events.php' );
}






 ?>