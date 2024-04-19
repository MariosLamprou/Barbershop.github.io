<!--τσεκάρω αν ο χρήστης ειναι συνδεδεμενος -->

<?php
    session_start();

    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something posted
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];

		if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($phone) && !empty($password))
		{
			//save to database

			$query = "insert into users (firstname,lastname,username,email,phone,password) values ('$firstname','$lastname','$username','$email','$phone','$password')";
			mysqli_query($con, $query);
			//redirect to login
			header("Location: login.php");
			die;
		}
		else{
			echo ("Insert valid information!");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div class="container">
	    <form action="signup.php" method="POST">
	   		<h2>Sign Up Form</h2>
	    	<label for="firstname">Firstname</label>
			<input type="text" id="firstname" name="firstname" required>
			<label for="lastname">Lastname</label>
			<input type="text" id="lastname" name="lastname" required>
			<label for="username">Username</label>
	    	<input type="text" id="username" name="username" required>
	    	<label for="email">Email</label>
	    	<input type="email" id="email" name="email" required>
	    	<label for="phone">Phone</label>
	    	<input type="phone" id="phone" name="phone" required>
			<label for="password">Password</label>
	    	<input type="password" id="password" name="password" required>
	    	<button type="submit">Register</button>
			<p>Are you a member?<a href="login.php">Signin.</a></p>
	    </form>
	</div>
</body>
</html>