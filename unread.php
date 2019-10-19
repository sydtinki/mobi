<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>New Messages(s)</title>
<style>
#data{
position:absolute;
color:black;
margin-left:6mm;
text-align:justify;
font-size:14px;
width:70mm;
}
a{
color:red;
}
a:hover{
color:orange;
}
a:visited{
color:red;
}
body{
background:white;}
#bck{
width:40%;
}
</style>
<script>
window.onload=write;

function write(){  
var numb=screen.width;
var wdth=0.20*numb*1;
var units="mm";
document.getElementById("data").style.width=wdth+units;
document.getElementById("bck").onclick=back;
if(numb>=1280)
{   
document.getElementById("data").style.left=15+"%";
}
}
function back(){
history.back();
}
</script>

<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if(isset($_GET['time']))
$tme=$_GET['time'];
$select="select sender from messages where receiver=$me AND status='unread' GROUP BY sender ORDER BY stamp ASC";
$result = mysql_query($select); 
$rows = mysql_num_rows($result); 

echo "<div id='data'><button id='bck'>back</button><p>";

for($i=0; $i<$rows; ++$i){  
$row = mysql_fetch_row($result); 
echo incoming($row[0],$me)."<p>";           
}

if($rows==0){
echo "<font color='red' face='courier' size='5mm'>No new message(s)</font>";
}
echo "</div>";
 
function incoming($x,$y){
$select="select message from messages where receiver=$y AND sender=$x AND status='unread' ORDER BY stamp ASC";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);

 echo "<b><a href='m.chat.php?oponent=$x'>".names($x)."</a></b><p>";
  for($i=0; $i<$rows; ++$i){  
     $row = mysql_fetch_row($result); 
        echo "- ".$row[0]."<br>";           
}
}

function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
  for($i=0; $i<$rows; ++$i){  
    $row = mysql_fetch_row($result); 
       return $row[0]."  ". $row[1];           
}
}
$update="update messages set status='read' where status='unread' AND receiver=$me";
$updated = mysql_query($update);
?>
</head>
<body>
</body>
</html>