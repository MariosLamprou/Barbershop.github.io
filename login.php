<?php
    session_start();

    include("connection.php");
    include("function.php");

	

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{
			//read from database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);
            if ($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {

						$_SESSION['userid'] = $user_data['userid'];
                        //redirect to login
			            header("Location: booking.php");
			            die;
                    }
                }
            }
			
		}
		else{
			echo "<div class='notification'>Wrong username or password!</div>";
		}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>SignIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<div class="container">
		<h2>Log-in</h2>
		<form action="login.php" method="post">
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit">Sign-in</button>
            <p>Aren't you a member?<a href="signup.php">Signup.</a></p>
		</form>
	</div>	
	
	<!--χρηση κωδικα js για να εμφανιζεται παραθυρο σε περιπτωση λαθος κωδικου ή ονοματος χρηστη-->
	<div class="notification">
		<script type="text/javascript">
			alert("Wrong username or password!");
		</script>
	</div>	
</body>
</html>