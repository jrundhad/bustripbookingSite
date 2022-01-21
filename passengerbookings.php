<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Trips by Passenger</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the trips.</h1>

<?php
//present the bookings of selected passenger
   $id= $_POST["passenger"];
   $query = 'SELECT firstname,lastname, tripname, price FROM passenger p, booking b, bustrip bt WHERE p.passengerid = b.passengerid and bt.tripid=b.tripid and p.passengerid=' . $id . ' ';
   $result=mysqli_query($connection,$query);
    if (!$result) {
        die("Did not select Passenger");
     }
     echo "<table border='1'> <tr><th>First Name</th><th>Last Name</th><th>Trip Name</th><th>Price</th></tr>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["tripname"]."</td><td>".$row["price"]."</td></tr>";   
     }
     echo "</table>";
     mysqli_free_result($result);
?>
<br>
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>