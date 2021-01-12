<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b6be6324539b6d');
define('DB_PASS','57f7729');
define('DB_NAME','heroku_fabc276d92d4c52');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
