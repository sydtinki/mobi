<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];

 if(isset($_GET['delete']))
    $delete=$_GET['delete']; 
     $confirm="delete from messages where receiver=$me and sender=$delete";
 function queryMysql($query){ 
    $result = mysql_query($query) or die("");
    return $result; }

     queryMysql($confirm); echo "deleted";

?>
