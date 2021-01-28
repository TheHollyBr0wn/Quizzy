<?php

	include 'dbconn.php'; // connects to database

	// values typed and stored on index.php
	$email = $_POST["email"];
	$name = $_POST["name"];
	$password = $_POST["pass"];
	$checkP = $_POST["Cpass"]; 

	session_start(); // global variable start
	$_SESSION['s_fname'] = $name; // their name is stored in this
	$_SESSION['s_email'] = $email; // email stored in this
	// if var's left empty - set to null
	if(empty($name)) {
	  $name == null;
	} elseif(empty($password)) {
	  $password == null;
	} elseif(empty($checkP)) {
	  $checkP == null;
	} elseif(empty($email)){
	  $email == null;
	}

	// Check if account exists
	$sql = "SELECT * FROM accounts WHERE Email = '$email'"; // set up of query

	if ($result = $conn->query($sql)) { // querys the DB
		$row_cnt = $result->num_rows; // counts number of rows which it found
		if ($row_cnt > 0){ // if nothing found then returns an error
			header('Location: index.php?err=6');
		}
	}

	// Check for errors
	if ($password != $checkP){  
		// Passwords are not the same
		header('Location: index.php?err=1');
	} elseif ($password == null) {
		// Password left blank
		header('Location: index.php?err=2');
	} elseif ($checkP == null) {
		// checkP left blank
		header('Location: index.php?err=3');
	} elseif ($name == null) {
		// name left blank
		header('Location: index.php?err=4');
	} elseif($email == null){
		// email left blank
		header('Location: index.php?err=5');
	} else {
		// Execute query...
		$sql = "INSERT INTO accounts (Email, FName, Password, AccountID) VALUES ('$email','$name','$password', NULL)";
		$result = mysqli_query($conn, $sql) or die ("failed to query". mysqli_connect_error());
		echo "<html>";
		echo "<head>"; 
		echo "<meta http-equiv='refresh' content=0;URL=Profile.php?okay=2 />";
		echo "</head>";
		echo "</html>";
	}
?>