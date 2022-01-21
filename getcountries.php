
<?php
// get countries and use them as radio buttons
   $query = "SELECT country FROM bustrip";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="country" value="';
        echo $row["country"];
        echo '">' . $row["country"] . "<br>";
   }
   mysqli_free_result($result);
?>