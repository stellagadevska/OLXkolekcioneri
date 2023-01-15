<?php
 require('db-data.php');

 // If form submitted, insert values into the database.
 	
 	$email = $_POST['email'];
 	$password = $_POST['userpass'];

	$getUser =  "SELECT * FROM `users` WHERE email='$email'";

	$result = $conn->query($getUser);
		if ($result->num_rows > 0) {
   			//echo = "result";
   		 // output data of each row
	    	while($row = $result->fetch_assoc()) {
	        	$db_pass=$row["password"];
	        	if (password_verify($password, $db_pass)) {
    				
    				$_SESSION["username"] = $row["firstName"].' '.$row["lastName"];
    				$_SESSION["userID"] = $row["id"];
    				echo 'Logged in!';

				} else {
   					 echo 'Invalid username or password';
				}

    		}
		} else {
    		echo "Invalid username or password";
		}
	




?>