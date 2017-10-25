<!DOCTYPE html>
<html>
<head>	
<style>
	table,td {
		margin-top: 20px;
		margin-bottom: 20px;
		padding: 10px;
		border-collapse: collapse;
		border: 3px solid black;
	}
	#title {
		background-color: aliceblue;
		font-family: cursive;
	}
	#value {
		background-color:cornsilk;
		font-family: sans-serif;
	};
</style>


</head>
<body>

<?php 
	
	$firstName = $_POST["first_name"];
	$lastName = $_POST["last_name"];
	$email1 = $_POST["email"];
	$address1 = $_POST["address"];
	$city1 = $_POST["city"];
	
	
	
	$server = "localhost";
	$username = "root";
	$password = "noha1234";
	$db = "sakila";

	$conn = mysqli_connect($server, $username, $password, $db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully<br><br>";
	$query = "SELECT cus.first_name, cus.last_name,cus.email, a.address, c.city
		FROM customer cus
		JOIN address a
			ON cus.address_id = a.address_id
		JOIN city c
			on a.city_id = c.city_id
		ORDER BY last_name";
	
	$result = mysqli_query($conn, $query);
	$validationFirst ="New";
	$validationLast ="New";
	$validationEmail ="New";
	$validationAddress ="New";
	$validationCity ="New";
	if (mysqli_num_rows($result) > 0) {   
    	while($row = mysqli_fetch_assoc($result)) {
			if ($firstName == $row["first_name"]){
				$validationFirst = "exists";
			}
			else if ($lastName == $row["last_name"]){
				$validationLast = "exists";
			}
			else if ($email1 == $row["email"]){
				$validationLast = "exists";
			}
			else if ($address1 == $row["address"]){
				$validationLast = "exists";
			}
			else if ($city1 == $row["city"]){
				$validationLast = "exists";
			}
		}
	}
	echo "<table><tr><td id=\"title\"> First Name: </td> <td id=\"value\">" . $firstName. "</td><td>".$validationFirst."</td></tr><tr><td id=\"title\"> Last Name: </td> <td id=\"value\">" .$lastName. "</td><td>".$validationLast."</td></tr><tr><td id=\"title\"> Email: </td> <td id=\"value\">" .$email1. "</td><td>".$validationEmail."</td></tr><tr><td id=\"title\"> Address: </td> <td id=\"value\">" .$address1. "</td><td>".$validationAddress."</td></tr><tr><td id=\"title\"> City: </td> <td id=\"value\">" .$city1. "</td><td>".$validationCity."</td></tr></table>";
	?>



</body>
</html>