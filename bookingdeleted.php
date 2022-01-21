<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Booking</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>

<!-- Deletes a booking with the given inputs -->
<?php
    $params = explode(",", $_POST['selection']);
    $tripid = (int)$params[0];
    $passid = (int)$params[1];
    $query = 'DELETE FROM booking where tripid=' . $tripid. ' and passengerid=' . $passid . '';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         echo "Error: could not delete booking make sure you selected a booking to delete";
    } else {
        echo 'Booking Successfully deleted.';
    }
?>


<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>