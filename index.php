<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Assingment 3</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php
        // connect to the database
        include 'connectdb.php';
        ?>
        
        <!--  allow user to select how the want to view the bus trips -->
        <h1>Bus Trip</h1>
        <img class ="bus" src="https://www.clipartkey.com/mpngs/m/5-57609_coach-clipart-old-bus-buses-clipart.png" align="right">
        <form action="gettrips.php" method="post">
            What do you want to order by? </br>
            <input type="radio" name="attribute" value="country"> Country <br>
            <input type="radio" name="attribute" value="tripname"> Name <br><br>
            How do you want it sorted </br>
            <input type="radio" name="sorting" value="asc"> Ascending <br>
            <input type="radio" name="sorting" value="desc"> Descending <br>
            <input type="submit" value="Get Data">
        </form>
        <p>
            <hr>
        <p>
        <!--  Add new trip portion-->

        <h1> Add a New Trip </h1>
        <form action="addnewtrip.php" method="post">
        New Trip ID: <input type="number" name="newID"><br>
        New Trip Name: <input type="text" name="TripName"><br>
        New Start Date:  <input type="date" name= 'newstart'><br>
        New End Date:  <input type="date" name= 'newend'><br>
        New Trip Country: <input type="text" name="country"><br>
        Choose a bus to assign to this trip: <br>
        <?php
        include 'getbusses.php';
        ?>
        New Trip Image URL <input type="text" name="url"><br>
        <input type="submit" value="Add New trip">
        </form>

        <p>
            <hr>
        <p>
        <!-- get trips by country -->
        <h1> Get Trips by Country</h1>
        <form action="tripsbycountry.php" method="post">
        <?php
        include 'getcountries.php';
        ?>
        <input type="submit" value="Get trips">
        </form>

        <p>
            <hr>
        <p>

        <!--create bookings-->

        <h1>Create Booking for Passenger</h1>
        <form action="newbooking.php" method="post">
        Select Passenger: <br>
        <?php
        include 'getpassengers.php';
        ?>
        <br>
        Select Trip: <br>
        <?php
        include 'listtrips2.php';
        ?>
        <br>
        Enter a Price: <input type="number" name="price"><br>  
        <input type="submit" value="Create Booking">
        </form>

        <p>
            <hr>
        <p>
        
        <!-- display passenger and their passport information -->

        <h1> Passenger and Passport Information </h1>
        <?php
        include 'passpass.php';
        ?>

        <p>
            <hr>
        <p>
        
        <!-- view bookings based on passenger selected -->
        <h1> Bookings by Passenger </h1>
        Select a passenger to view their bookings: <br>
        <form action="passengerbookings.php" method="post">
        <?php
        include 'getpassengers.php';
        ?>
        <input type="submit" value="Get trips">
        </form>

        <p>
            <hr>
        <p>

        <!--delete a booking -->
        <h1>Press Delete to Delete a Booking</h1>
        <form action="deletebooking.php" method="post">
        <input type="submit" value="Delete a Booking">
        </form>



        <p>
            <hr>
        <p>
        <!-- view trips with no bookings -->
        <h1> Trips With No Bookings </h1>
        <?php 
        include 'nobookings.php'
        ?>


    
        <?php
        mysqli_close($connection);
        ?>
        
    </body>
</html>