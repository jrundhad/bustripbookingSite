<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Adding New Booking</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Your New Booking:</h1>
<ol>
<?php
// add a new booking if booking cannot be added let the user know that passenger is already booked for that trip
    $passid= $_POST["passenger"];
    $tripid = $_POST["selection"];
    $price = $_POST["price"];
    if($passid != null and $tripid!= null and $price !=null){
        $query = 'INSERT into booking values(' . $passid . ', ' . $tripid . ' , ' .  $price . ') '; 
        $result=mysqli_query($connection,$query); 
        if (!$result) {
            echo "Passenger is already booked for that trip";
        } else {
            echo "Booking Successfully Created";
        }
    } else {
        echo 'Please go back and provide all neccesary inputs: Passenger, Trip and Price';
    }


   mysqli_close($connection);
?>
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
</ol>
</body>
</html>