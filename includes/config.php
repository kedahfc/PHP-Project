<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b6be6324539b6d');
define('DB_PASS','57f7729');
define('DB_NAME','heroku_fabc276d92d4c52');
// Establish database connection.
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
