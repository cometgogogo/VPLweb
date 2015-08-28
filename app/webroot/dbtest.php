<?PHP
$connect=mysql_connect("db.start.ca","vaughan","b00k@vp1") or die("Unable to Connect");
mysql_select_db("vaughan") or die("Could not open the db");
$showtablequery="SHOW TABLES FROM vaughan";
$query_result=mysql_query($showtablequery);
while($showtablerow = mysql_fetch_array($query_result))
{
echo $showtablerow[0]." <br />";
}
?>
