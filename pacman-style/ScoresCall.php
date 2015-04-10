<?php
$servername = "139.62.63.234";
$username = "n00858385";
$password = "cop8385";

echo "<p>Inside php File</p>";

	$conn =mysql_connect($servername, $username, $password);

	//Check Connection
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    echo "<p>Connected successfully</p>";
?>