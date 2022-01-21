<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Adding New Trip</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Your New Trip:</h1>
<ol>
<?php
   // use raidio button values and set up the variable that will be used in sql squery to add the new trip
   $id= $_POST["newID"];
   $name = $_POST["TripName"];
   $start =$_POST["newstart"];
   $end =$_POST["newend"];
   $country =$_POST["country"];
   $busplate =$_POST["busPlate"];
   $url = $_POST["url"];
   $query1 = 'SELECT tripid FROM bustrip WHERE tripid='. $id. ' ' ;
   //echo $query1;
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          echo "Please go back and enter an id";
   } else {
   $row=mysqli_fetch_assoc($result);
   //echo $row;
   if(mysqli_num_rows($result)==0){
      $query = 'INSERT INTO bustrip values("' . $id . '","' . $name . '","' . $start . '","' . $end . '","' . $country . '","' .  $busplate . '","' . $url . '")';
      //secho $query;
      if (!mysqli_query($connection, $query)) {
         echo'Failed to add trip error with one or more values entered';
      } else {
         echo "<h3>Your Trip was added!</h3>";
      }

      

   } else {
      echo 'ID is already being used by another trip <br>';
   }
}

   mysqli_close($connection);
?>
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
</ol>
</body>
</html>