<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Record Keeping System</title>

<style type="text/css">
    
#heading {
  text-align: center;
  color: #2674aa;
  margin-top: 200px;
}
    
form {
    text-align: center;
}    
    
input[type=submit] {
    background-color: #2674aa;
    border-radius: 4px;
    color: white;
    padding: 16px 32px;
    margin: 4px 2px;
    cursor: pointer;
    font-family: 'Open Sans', sans-serif;
    font-size: 1em;
}
    
</style>    
    
    
</head>

<?php

/*
############################################################################
#                     Connect and INSERT Input INTO Database               #
############################################################################
*/ 

define('DB_NAME', 'wildlife_park');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

//Connecting to sql database

$link = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME);

if (mysqli_connect_error()) {
die ("Could not connect to database");
}

//Sending form data to sql database
mysqli_query($link, "INSERT INTO incident (EmployeeID, AnimalName, NPWS, Family, ArrivalDate, ArrivalTime, Address, Reason)
VALUES ('$_POST[EmployeeID]','$_POST[AnimalName]','$_POST[NPWS]','$_POST[Family]','$_POST[ArrivalDate]','$_POST[ArrivalTime]','$_POST[Address]','$_POST[Reason]')")
    
?>
    
<!--
############################################################################
#                       HTML BELOW Submitted For                           #
############################################################################
-->     
    
  <body>
  
    <h2 id="heading">This incident has been submitted</h2>
    
    <form action="index.php">
        <input type="submit" value="Report another incident">
    </form>    

    

  </body>

</html>    



