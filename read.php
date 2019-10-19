<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if(isset($_GET['time']))
$tme=$_GET['time'];
$update="update messages set status='read' where status='unread' AND receiver=$me";

function queryMysql($query){

$result = mysql_query($query) or die("ERR");
return $result; 
}
 
queryMysql($update); 

?>