<!--τσεκάρω αν ο χρήστης ειναι συνδεδεμενος και αν δεν ειναι τον οδηγω στο login-->
<?php
    session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Make your Appointment</title>
<link rel="stylesheet" href="style4.css">
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Hello, <?php echo $user_data['username']?><br>Make your Appointment!</h1>

<form action="submit.php" method="post">
  <label for="date">Ημερομηνία:</label>
  <input type="date" id="date" name="date" required><br><br>

  <label for="time">Ώρα:</label>
  <input type="time" id="time" name="time" required><br><br>
      
  
  <input type="submit" name="datetime" value="Make Reservation">
</form>


  
</body>
</html>