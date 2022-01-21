<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Delete Trip</h1>
<!-- PHP page to view whether trip was deleted or not -->
<?php
   $whichid= $_POST["id"];
   $query = 'DELETE FROM bustrip where tripid=' . $whichid. '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Error: could not delete trip (trip has bookings)");
    } else {
        echo 'Trip Successfully deleted.';
    }
?>
<br>
<br>
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
<?php
   mysqli_close($connection);
?>
</body>
</html>