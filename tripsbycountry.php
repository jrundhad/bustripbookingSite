<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bus Trips</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the trips.</h1>

<?php
// get the associated trips with each country
   $country= $_POST["country"];
   $query = 'SELECT * FROM bustrip where country= "' . $country . '" ';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo "Trip ID:\t", $row["tripid"], " | ", "\tName:\t", $row["tripname"], " | ", "\tStart Date:\t", $row["startdate"], " | ", "\tEnd Date:\t", $row["enddate"], " | ", "\tCountry:\t", $row["country"], " | ", "\tBus Plate:\t", $row["assignedbus"];
        if ($row["urlImage"] != NULL){
            echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        } else {
            echo '<img src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg" height="60" width="60">';
        }    
     }
     mysqli_free_result($result);
?>

<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>