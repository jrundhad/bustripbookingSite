<?php
// run sql query to gettrips and presnt it to UI with radio buttons
   $whichattribute= $_POST["attribute"];
   $whichsort= $_POST["sorting"];
   $query = 'SELECT * FROM bustrip order by ' . $whichattribute . ' '.$whichsort . '';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo '<input type="radio" name="selection" value=',$row["tripid"],'> ';
        echo "Trip ID:\t", $row["tripid"], " | ", "\tName:\t", $row["tripname"], " | ", "\tStart Date:\t", $row["startdate"], " | ", "\tEnd Date:\t", $row["enddate"], " | ", "\tCountry:\t", $row["country"], " | ", "\tBus Plate:\t", $row["assignedbus"] . " | ";
        if ($row["urlImage"] != NULL){
            echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        } else {
            echo '<img src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg" height="60" width="60">';
        }    
     }
     mysqli_free_result($result);
?>