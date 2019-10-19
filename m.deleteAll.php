<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];

    $select="select sender from messages where receiver=$me";
    $result = mysql_query($select); if(!$result) die(mysql_error()); 
    $rows = mysql_num_rows($result);
    $idx=-1;
    $sender = array();
function queryMysql($query){ 
    $result = mysql_query($query) or die("");
    return $result; }
 
 for($i=0; $i<$rows; ++$i){  $idx++; 
        $row = mysql_fetch_row($result);
        $sender[$idx]="$row[0]"; }

   for($c=0; $c<$rows; ++$c){  
        $confirm="delete from messages where receiver=$me and sender=$sender[$c]"; 
        queryMysql($confirm); }
  echo "All messages deleted";

?>
