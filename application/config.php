<?php

//================================================
/*

$con=mysqli_connect(

        "localhost"

        ,"root"

        ,"root"

        ,"db_restaurant"

);

//============================================================
*/


//for microsoft azure host pupuse

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
DEFINE ('DB_HOST', $connectstr_dbhost);
DEFINE ('DB_USER', $connectstr_dbusername);
DEFINE ('DB_PASSWORD', $connectstr_dbpassword);
DEFINE ('DB_NAME', $connectstr_dbname);
	 
	$con = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL');
	@mysql_select_db (DB_NAME) OR die ('Could not select the database');

?>