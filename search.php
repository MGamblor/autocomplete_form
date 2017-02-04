<?php

/*
############################################################################
#                 Connect and Query Database for Autofill                  #
############################################################################
*/ 

define('DB_NAME', 'wildlife_park');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

//Connecting to sql database

$connection = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME);

if (mysqli_connect_error()) {
  die ("Could not connect to database");
}

$return_arr = array();

//get search term
$searchTerm = $_GET['term']; //retrieve the search term that autocomplete sends

//get matched data from animals table

$query = mysqli_query($connection, "SELECT * FROM animals WHERE animals LIKE '%".$searchTerm."%' ORDER BY animals ASC"); //retrieve the search term that autocomplete sends

while ($row = mysqli_fetch_assoc($query)) {
    
	$data[] = array(
            'label' => $row['animals'],
            'value' => $row['family'],
            'id' => $row['code']
		);
}

//return json data
echo json_encode($data);


?>