<?php
$servername = "139.62.63.234";
$username = "n00858385";
$password = "cop8385";

echo "<p>Inside php File</p>";
try{
	$conn = new PDO("mysql:host = 139.62.63.234; dbname= n00858385", $username, $password);
	//set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p>Connected successfully</p>";
}
catch(PDOException $e){
	echo "<p>Connection failed: " . $e->getMessage() . "</p>";
}
$conn = null;
?>