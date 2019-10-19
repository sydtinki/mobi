<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>history</title>
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
$select="select receiver from messages where sender=$me GROUP BY receiver ORDER BY stamp DESC";
$result = mysql_query($select); if(!$result) die("");  
$rows = mysql_num_rows($result);

echo "<div id='data'><button id='bck'>back</button><p>";

for($i=0; $i<$rows; ++$i){   
$row = mysql_fetch_row($result);
echo "<b><a href='m.chat.php?oponent=$row[0]'>".names($row[0])."</b></a><br>".sent($row[0],$me)." sent::<br>".received($row[0],$me)."received '<p>"; }
echo "</div>";

function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select);  
$rows = mysql_num_rows($result);
for($i=0; $i<$rows; ++$i){  
$row = mysql_fetch_row($result); 
return $row[0]."  ". $row[1];           }
 }
function sent($x,$y){  
$count="select count(stamp) from messages where receiver=$x AND sender=$y"; 
$result = mysql_query($count); if(!$result) die("");
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result);         
        return "[".$row[0]."]"; }
     }
function received($x,$y){  
$count="select count(stamp) from messages where sender=$x AND receiver=$y"; 
$result = mysql_query($count); if(!$result) die("");
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result);         
        return "[".$row[0]."]"; }
     }
?>
</head>
<body>
</body>
</html>