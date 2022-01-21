<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Booking</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Select a booking to delete.</h1>
<!-- ask user to select a trip to delete -->
<form action="bookingdeleted.php" method="post">
<?php
   $query = 'SELECT p.passengerid, b.tripid,firstname,lastname, tripname, price FROM passenger p, booking b, bustrip bt WHERE p.passengerid = b.passengerid and bt.tripid=b.tripid';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    echo "<table border='1'> <tr><th>First Name</th><th>Last Name</th><th>Trip Name</th><th>Price</th></tr>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr><td>";
        echo '<input type="radio" name="selection" value=\'',$row["tripid"],',', $row["passengerid"],'\'> ';   
        echo $row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["tripname"]."</td><td>".$row["price"]."</td></tr>"; 
     }
     echo "</table>";
     mysqli_free_result($result);
?>
<input type="submit" value="Delete">
</form>

<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>