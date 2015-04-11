
<?php
define('DB_USER', 'marcus');
define('DB_PASS', 'pekka');
define('DB_DNS', 'mysql:host=104.131.127.30; dbname=pacman');

echo "Inside Scores";
try {
    $connection = new PDO(DB_DNS, DB_USER, DB_PASS);
    echo "Connection Successful";
} catch (PDOException $e) {
    print "Connection Failed " . $e->getMessage() . "<br/>";
    die();
}
?>