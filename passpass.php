<?php
// get passenger and passport info
    $query = " SELECT * FROM passenger p, passport pp WHERE p.passengerid = pp.passengerid ORDER BY lastname";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    echo "<table border='1'> <tr><th>Passengerid</th><th>First Name</th><th>Last Name</th><th>Passport Number</th><th>Citizenship Country</th><th>Expiry Date</th><th>Birth Date</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["passengerid"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["passportnum"]."</td><td>".$row["citizenshipcountry"]."</td><td>".$row["expireydate"]."</td><td>".$row["birthdate"]."</td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
?>