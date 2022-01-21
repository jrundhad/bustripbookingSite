
<?php
// get bussses and use them as radio buttons
   $query = "SELECT licenseplate FROM bus";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="busPlate" value="';
        echo $row["licenseplate"];
        echo '">' . $row["licenseplate"] . "<br>";
   }
   mysqli_free_result($result);
?>