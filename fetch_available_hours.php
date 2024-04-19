<?php
    include("connection.php");

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['date'])) {
        $date = $_GET['date'];
    
        // Εκτέλεση SQL για να επιστραφούν οι διαθέσιμες ώρες για τη συγκεκριμένη ημερομηνία
        $query = "SELECT time FROM appointments WHERE date = '$date'";
        $result = mysqli_query($con, $query);
    
        if ($result) {
            $available_hours = array();
    
            // Προσθήκη των διαθέσιμων ωρών στον πίνακα
            while ($row = mysqli_fetch_assoc($result)) {
                $available_hours[] = $row['time'];
            }
    
            echo json_encode($available_hours);
        } else {
            echo json_encode(array());
        }
    } else {
        echo json_encode(array());
    }
    ?>






?>