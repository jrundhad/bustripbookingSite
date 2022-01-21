<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Bus Trip</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>You have selected the following trip to delete:</h1>
<!-- present selected trip and ask user to confirm deltion -->
<?php
   $whichid= $_POST["id"];
   $query = 'SELECT * FROM bustrip where tripid=' . $whichid. '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
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
Press confirm to proceed with deletion. Otherwise return to home page<br>
<form action="confirmdelete.php" method="post">
<input type="hidden" name="id" 
    value="<?php echo $whichid; ?>">
<input type="submit" value="Confirm">
</form>


<br>
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
<?php
   mysqli_close($connection);
?>
</body>
</html>