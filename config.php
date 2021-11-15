<?php
/*this is the configuration file
*/
$localhost = "localhost";
$db_name = "chat_db";
$db_user = "root";
$db_pass = "";

//new con string
$mysqli = new mysqli($localhost, $db_user, $db_pass, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
} //end of new con string
?>
