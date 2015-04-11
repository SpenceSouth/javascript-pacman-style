
<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DNS', 'mysql:host=localhost;dbname=n00858385');

echo "Inside Scores";
try {
    $connection = new PDO(DB_DNS, DB_USER, DB_PASS);
    echo "Connection Successful";
} catch (PDOException $e) {
    print "Connection Failed " . $e->getMessage() . "<br/>";
    die();
}
?>