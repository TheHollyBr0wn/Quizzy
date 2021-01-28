<?php

	include 'dbconn.php'; // connect with data base

	// values typed and stored on index.php
	$email = $_POST["email"];
	$pass = $_POST["pass"];

	$sql = "SELECT * FROM accounts WHERE Email='$email'"; // query for their name
	$result = mysqli_query($conn, $sql); // returns true/false if anything found

	if (!$result) { // if result not true then...
		die("Database access failed: " . mysqli_error()); // kills the program, returns error
	} else {
		$rows = mysqli_num_rows($result); // else number of rows found is put into a var
	}    
		    
	if ($rows) { // if there are rows - so a number
		session_start(); // creates a session (Global var)
		$_SESSION['s_email'] = $email; // email stored in this
		while ($row = mysqli_fetch_array($result)) { // goes through each row of info
			// Loop through every row in the database here...
			$fname = $row['FName']; // first name is stored in the variable 
			$_SESSION['s_fname'] = $fname; // name is stored into a global variable
		} // session allows that variable to be used in any other file
	}

	// Check if account exists
	$sql = "SELECT * FROM accounts WHERE Email='$email' AND Password='$pass'"; // puts query into a variable
	if ($result = $conn->query($sql)) {  // query is done on the database
		$row_cnt = $result->num_rows; // collects data - number of rows in this case 
		if ($row_cnt >= 1){ // if number of rows is more than one then the account exists
		                    // not that the email and password MUST match the ones in the DB to the input given 
			$row = $result->fetch_assoc(); // collects those results
				echo "<html>";
				echo "<head>";
				echo "<meta http-equiv='refresh' content=0;URL=Profile.php?okay=1 />"; // sends to the profile page
				echo "</head>";                                                        // account exists
				echo "</html>";	
		} else {
				echo "<html>";
				echo "<head>";
				echo "<meta http-equiv='refresh' content=0;URL=index.php?err=7 />"; // sends back to index - returns error
				echo "</head>";                                                     // account does not exist
				echo "</html>";
		}
	}

?>
