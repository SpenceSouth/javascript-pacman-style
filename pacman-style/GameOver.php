<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Goosepocalypse: Game Over</title>
    <link rel="stylesheet" type="text/css" href="highScoreStyle.css">
</head>

<h1>GAME OVER</h1>

<div>
    <?php

    $playerScore = $_GET['score'];
    $playerName = $_GET['playerName'];
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
        $size = $conn->query("SELECT * FROM pacman ORDER BY Score DESC ")->fetchColumn();
        $size = $size - 1;
        if($playerScore >= $results[$size]['SCORE']){

            $stmt = $conn->prepare("DELETE FROM pacman WHERE name=:playerName");
            $stmt->bindParam(':playerName', $results[4]['NAME']);
            $stmt->execute();

            $stmt = $conn->prepare("INSERT INTO pacman VALUES(:playerName, :playerScore)");
            $stmt->bindParam(':playerName', $playerName);
            $stmt->bindParam(':playerScore', $playerScore);
            $stmt->execute();

            $stmt = $conn->prepare("SELECT * FROM pacman ORDER BY Score DESC ");
            $stmt->execute();

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

        }else{

            // Create HTML table to be filled
            echo "<table>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>";

            foreach($results as $result){
                echo "<tr><td>" .$result["NAME"] . "</td>" . "<td>" . $result["SCORE"] . "</td>";
            }
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
