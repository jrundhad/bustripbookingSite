<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Changes</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h2>Here are your changes</h2>

<?php
    // set up variables that will be updated in db
   $whichid= $_POST["id"];
   $newname =  $_POST["tripname"];
   $newstart=  $_POST["newstart"];
   $newend =  $_POST["newend"];
   $url = $_POST["newurl"];
   echo '<br>';

   // update name;
   if($newname!=null){
       $query = 'UPDATE bustrip SET tripname=\'' . $newname. '\' where tripid=' . $whichid. '';
       $result=mysqli_query($connection,$query);
        if (!$result) {
            die("new name query failed.");
        } else {
            echo 'Name succesfully changed';
            echo '<br>';
        }
   }

   // update new start date
   if($newstart!=null){
       $query = 'UPDATE bustrip SET startdate=\'' . $newstart. '\' where tripid=' . $whichid. '';
       $result=mysqli_query($connection,$query);
        if (!$result) {
            die(" new start date query failed.");
        } else {
            echo 'Start Date succesfully changed';
            echo '<br>';
        }
   }

   //update url 
   if($newstart!=null){
       $query = 'UPDATE bustrip SET urlImage=\'' . $url. '\' where tripid=' . $whichid. '';
       $result=mysqli_query($connection,$query);
        if (!$result) {
            die("image query failed.");
        } else {
            echo 'Image succesfully changed';
            echo '<br>';
        }
   }

   //update end date
   if($newend!=null){
       $query = 'UPDATE bustrip SET enddate=\'' . $newend. '\' where tripid=' . $whichid. '';
       $result=mysqli_query($connection,$query);
        if (!$result) {
            die("new end date query failed.");
        } else {
            echo 'End Date succesfully changed';
            echo '<br>';
        }
   }

   // display changes of trip
   $query = 'SELECT * FROM bustrip where tripid=' . $whichid. '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo 'Here is the updated trip:<br>';
        echo "Trip ID:\t", $row["tripid"], " | ", "\tName:\t", $row["tripname"], " | ", "\tStart Date:\t", $row["startdate"], " | ", "\tEnd Date:\t", $row["enddate"], " | ", "\tCountry:\t", $row["country"], " | ", "\tBus Plate:\t", $row["assignedbus"];
        if ($row["urlImage"] != NULL){
            echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        } else {
            echo '<img src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg" height="60" width="60">';
        }    
     }
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