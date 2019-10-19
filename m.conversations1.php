<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if($_COOKIE[$cookie_name]==""){echo "sign in failed";}

$select="select sender, message, MAX(stamp) as time, receiver from messages where receiver=$me GROUP BY sender ORDER BY time DESC";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
$name=names($me);  
$statement=statement($me);
echo "<table border='0' width='300' id='tab' onMousedown='javascript:whichButton(event)'><tr><td id='menu'><a href='javascript:menu()'>[=]</a></td><td id='name'>".$name."</td></tr><tr><td></td><td id='statement'><i>".$statement."<i></td><td id='inbox'>&nbsp;</td></tr></table><p>";
echo "<div id='data'>";

for($i=0; $i<$rows; ++$i){    
   $row = mysql_fetch_row($result); 
   echo "<input type='button' onclick='javascript:openChatPg($row[0])' value='".names($row[0])."' id='Bee'></a></b><br /><span id='date'>".$row[2]."</span><p>".lastmsg($row[0],$me,$me)."<p><p>";
}

function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0]." ". $row[1];           }
 }

function status($x,$y){ 
$select="select status from messages where sender=$x AND receiver=$y";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0];}

 }
function statement($x){  
$select="select statement from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  $space="  ";
        $row = mysql_fetch_row($result); 
             return  $space. $row[0];}
 }
function lastmsg($x,$y,$num){ $my_num=$num;

$select="select status, SUBSTRING(message,1,45), receiver, sender from messages where sender=$x AND receiver=$y OR sender=$y AND receiver=$x ORDER BY stamp DESC LIMIT 1";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
                        
for($i=0; $i<$rows; ++$i){  
   $row = mysql_fetch_row($result);   $color=colorful($row[0],$row[2]);  
if($row[3]==$my_num){ $space="  ";  $arrw=$space." ";   $row[1].=$arrw; }
else { $space="  ";  $arrw=$space." ::";  $row[1].=$arrw; }
    return "<span id='$color'>".$row[1]."</span>";       
}   
}

function colorful($x,$y){ 
   $color1="unread";
   $color2="read";
     if($x=="unread"){
        if($y==$me){
   return $color1; 
} }

else { return $color2;  
}
}
        
?>

