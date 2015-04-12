<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Goosepocalypse: High Scores</title>
    <link rel="stylesheet" type="text/css" href="highScoreStyle.css">
</head>

<h1>High Scores</h1>

<div>
    <?php
    define('DB_USER', 'n00858385');
    define('DB_PASS', 'cop8385');
    define('DB_DNS', 'mysql:host=139.62.63.234; dbname=n00858385');


    try {
        // Connect to the Database
        $conn = new PDO(DB_DNS, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create a prepare statement to retrieve High Scores
        $stmt = $conn->prepare("SELECT * FROM pacman ORDER BY Score DESC ");
        $stmt->execute();

        //View results of query
        $results = $stmt->fetchAll();

        // Create HTML table to be filled
        echo "<table>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>";

        foreach($results as $result){
            echo "<tr><td>" .$result["NAME"] . "</td>" . "<td>" . $result["SCORE"] . "</td>";
        }


    } catch (PDOException $e) {
        print "Connection Failed " . $e->getMessage() . "<br/>";
        die();
    }

    $conn = null;
    ?>
</div>





<div>
    <ul id="link">
        <li id="linkListItem">
            <a href="startScreen.html" class="returnButton"><span class="round">Main Menu</span></a>
        </li>
    </ul>
</div>

</body>
</html>