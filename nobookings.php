<?php
// get trips with no bookings
    $query = "SELECT * FROM (SELECT tripname, count(passengerid) AS bookings FROM bustrip bt LEFT JOIN booking b ON bt.tripid=b.tripid GROUP BY 1) a WHERE bookings = 0";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    echo "<table border='1'> <tr><th>Trip Name</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["tripname"]."</td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
?>