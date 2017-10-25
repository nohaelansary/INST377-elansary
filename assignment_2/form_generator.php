<!DOCTYPE html>
<html>
<head>	
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}
</style>

<script>
function validateForm() {
    // you can write a code for validating your forms (if you want).
}
</script>

</head>
<body>
    <?php 
        $server = "localhost";
		$username = "root";
		$password = "noha1234";
		$db = "sakila";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
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
WHERE cus.first_name = 'IDA'
ORDER BY last_name";
        
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {   
		while($row = mysqli_fetch_assoc($result)) {
			$first_name= $row["first_name"];
			$last_name= $row["last_name"];
			$email= $row["email"];
			$address = $row["address"];
			$city= $row["city"];

		}
	} else {
		echo "No results..";
	}
    
         echo "<form method=\"post\" action=\"form_display.php\">";
         echo "First Name: <input type=\"text\" name=\"first_name\" value = \"" . $first_name . "\"><br>";
         echo " Last Name: <input type=\"text\" name=\"last_name\" value = \"" . $last_name . "\"><br>";
         echo " E-mail: <input type=\"text\" name=\"email\" value = \"" . $email. "\"><br>";
         echo "Address: <input type=\"text\" name=\"address\" value = \"" . $address . "\"><br>";
         echo "City: <input type=\"text\" name=\"city\" value = \"" . $city . "\"><br>";
         echo "<input type=\"submit\">
        </form>";     
    
	?>
</body>
</html>