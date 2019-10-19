<?php
require_once 'log_in.php'; 
if(isset($_GET['time'])&&
isset($_GET['seen']))
$tme=$_GET['time'];
$seen=$_GET['seen'];
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
 
 $select="select sender, message, MAX(stamp) as time, receiver from messages where receiver=$me GROUP BY sender ORDER BY time DESC";
 $result = mysql_query($select); if(!$result) die("please login"); 
 $rows = mysql_num_rows($result);
 $ib=inbox($me); 
 $tme=time(); 
 $time_chck=$tme+5;

 $addme="insert into status values($tme,$me,$time_chck)";
 $track="update member set seen='$seen' where numb=$me";
 $clear="delete from status where tme<$tme";
 $added = mysql_query($addme);
 $seen = mysql_query($track);
 $cleared = mysql_query($clear);
 echo "<img src='s.png' width='30' height='30' id='start' onclick='javascript:compose();'><P>"; 
 
     for($i=0; $i<$rows; ++$i){  $space="  ";  
        $row = mysql_fetch_row($result);  
 echo "<span id='online'>".active_user($row[0])."</span> <input type='button' onclick='javascript:openChatPg($row[0])' value='".names($row[0])."' id='Bee'> ".msgcount($row[0],$row[3])."<br /><span id='date'>".$row[2]."</span><br>".lastmsg($row[0],$me,$me)."<br><button onclick='javascript:Delte($row[0])' id='del'> delete</button><p>";
  } echo "<form name='inboxFrm'><input type='hidden' id='ib' value='$ib'></form>";    
    echo "<span id='bottomad'><p><span id='adsContents'></span></div>";


function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0]." ".$row[1];           
}
}
function inbox($x){     
$count="select count(status) from messages where status='unread' AND receiver=$x"; 
$result = mysql_query($count); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "[".$row[0]."]"; }
      if($row[0]==0){
        return " "; 
} 
}  
}
 function active_user($x){     
  $count="select count(tme) from status where oponent=$x"; 
  $result = mysql_query($count);  
  $rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "*"; }
      if($row[0]==0){
        return " "; 
} 
}  
}
function msgcount($x,$y){  
$count="select count(status) from messages where status='unread' AND receiver=$y AND sender=$x"; 
$result = mysql_query($count); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "[".$row[0]."]"; 
} 
}
}
function lastmsg($x,$y,$num){ 
$my_num=$num;
$select="select status, SUBSTRING(message,1,45), receiver, sender from messages where sender=$x AND receiver=$y OR sender=$y AND receiver=$x ORDER BY stamp DESC LIMIT 1";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);                   
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result);   $color=colorful($row[0],$row[2]);  

 if($row[3]==$my_num){  $arrw="  '";   $row[1].=$arrw; } 

    else {  $arrw="  ::";  $row[1].=$arrw; }
    
             return "<span id='$color'>".$row[1]."</span>";       
}   
}

function colorful($x,$y){ 
$color1="unread";
$color2="read";

if($x=="unread"){

if($y==$me){
return $color1; 
} 
}
else { 
return $color2;  
}
}

?>