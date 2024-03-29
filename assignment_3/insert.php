<?php

require "config.php";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// A function for general queries.
function query_to_db($conn, $sql){
    $result = mysqli_query($conn, $sql);

    if ($result) {   
        echo "Your query was successful";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


// Receving the submitted data
$city = $_POST["city_name"];
$country = $_POST["country_id"];


// You need to save the data into the database. Write an INSERT query here.
$sql = "INSERT INTO city (country_id, city) VALUES ('$country', '$city');";
query_to_db($conn, $sql);


mysqli_close($conn);


