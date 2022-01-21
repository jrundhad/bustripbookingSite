<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bus Trips</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- connect to the database -->
<?php
include 'connectdb.php';
?>
<h1>Here are the trips.</h1>

<!-- call listtrips that presents the trips -->
<form action="modify.php" method="post">
<h2> Select the one you wish to change/delete or go back to homepage </h2>
<ol>
    <?php
    include 'listtrips.php';
    ?>
</ol>
<input type="submit" value="Next Step">
</form>

<br>
<!-- go back to hompage -->
<form action="index.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
   mysqli_close($connection);
?>
</body>
</html>