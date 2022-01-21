<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Modify Bus Trips</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>You have selected the following trip:</h1>

<?php
// present the selected trip
   $whichid= $_POST["selection"];
   $query = 'SELECT * FROM bustrip where tripid=' . $whichid. '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
        $url = $row["urlImage"];
        echo "Trip ID:\t", $row["tripid"], " | ", "\tName:\t", $row["tripname"], " | ", "\tStart Date:\t", $row["startdate"], " | ", "\tEnd Date:\t", $row["enddate"], " | ", "\tCountry:\t", $row["country"], " | ", "\tBus Plate:\t", $row["assignedbus"];
        if ($row["urlImage"] != NULL){
            echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        } else {
            echo '<img src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg" height="60" width="60">';
        }    
     }
     mysqli_free_result($result);
?>

<!-- ask users if they want to change or delete the trip -->
<form action="change.php" method="post">
<input type="hidden" name="id" 
 value="<?php echo $_POST['selection']; ?>">
 <input type="hidden" name="url" 
 value="<?php echo $url; ?>">
<input type="submit" value="Change">
</form>

<form action="delete.php" method="post">
<input type="hidden" name="id" 
 value="<?php echo $_POST['selection']; ?>">
<input type="submit" value="Delete">
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