<?php
$hostname='localhost'; //// specify host, i.e. 'localhost'
$user='thevall7_erp'; //// specify username
$pass='thevalleyschool123'; //// specify password
$dbase='thevall7_erp_stationery_store'; //// specify database name
$connection = mysql_connect("$hostname" , "$user" , "$pass") 
or die ("Can't connect to MySQL");

$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

?>
