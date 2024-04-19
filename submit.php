<?php
    session_start();

    $con = mysqli_connect("localhost", "root", "", "barbershop");

    if(isset($_SESSION['datetime']))
    {
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $query = "INSERT INTO appointments(userid,date,time) VALUES ('$userid', '$date','$time')";

        $result = mysqli_query($con,$query);
        if($result)
        {
            $_SESSION['status']= "Thanks for the reservation!";
            header("Location: index.php");
        }
        else {
            $_SESSION['status']= "error!";
            header("Location: booking.php");
        }
    }
   

?>