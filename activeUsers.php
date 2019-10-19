<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>Active User(s)</title>
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
$select="select sender from messages JOIN status ON status.oponent=messages.sender where receiver=$me GROUP BY sender; ";
$result = mysql_query($select);  
$rows = mysql_num_rows($result);

echo "<div id='data'><button id='bck'>back</button><p>";

for($i=0; $i<$rows; ++$i){   
$row = mysql_fetch_row($result);
echo "<b><a href='m.chat.php?oponent=$row[0]'>".names($row[0])."</b></a><span id='online'> *</span><p>"; }

if($rows==0){
echo "<font color='red' face='courier' size='5mm'>No active friend(s)</font>";
}
echo "</div>";

function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);

for($i=0; $i<$rows; ++$i){  
$row = mysql_fetch_row($result); 
return $row[0]."  ". $row[1];           
}
}

?>
</head>
<body>
</body>
</html>