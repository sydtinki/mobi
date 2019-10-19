<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if(isset($_GET['time']))
$tme=$_GET['time'];
$update="select count(sender) from notification1 where receiver<>''";

function queryMysql($query){

$result = mysql_query($query) or die("ERR");
return $result; 
}
 
queryMysql($update); 

$result = mysql_query($update);  
$rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
$sql="select sender,receiver from notification1 where sender<>'' GROUP BY receiver";
$result = mysql_query($sql);  
$rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
        notify($row[0],$row[1]); }
}
}

function notify($x,$y){
$sql="select count(sender) from notification1 where sender='$x'";
$result = mysql_query($sql);  
$rows = mysql_num_rows($result);

 for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
if($row[0]!=0){ $who=names($x);
        echo "$who sent you a message on txtapplication.net. To view your message dial *123#<p>"; 

$del="delete from notification1 where sender<>''"; mysql_query($del);
}
}
}

 function names($c){  $select="select name, sname from member where numb=$c";
                        $result = mysql_query($select); 
                        $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  $space="  ";
        $row = mysql_fetch_row($result); 
             return $row[0]. $space. $row[1];           }
 }

?>