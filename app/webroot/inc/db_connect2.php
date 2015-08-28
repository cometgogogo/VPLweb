<?php

/*
 * File: db_connect.php
 * Date: Feb. 4, 2005
 * Author: Yue Sun
 */

$Host = "db.start.ca";
$User = "vaughan";
$Password = "b00k@vp1";


/*
@ $db = mysql_pconnect($Host,$User,$Password);

if(!$db) { $db = mysql_pconnect($Host,$User,$Password); };
*/

$db = mysql_connect($Host,$User,$Password);
if(!$db) { print "Could not make the connection to database!"; die; };
mysql_select_db("vaughan2");


?>