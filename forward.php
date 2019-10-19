<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>forward</title>
<style>
#data{
position:absolute;
color:black;
margin-left:6mm;
text-align:justify;
font-size:14px;
width:70mm;
}
#print{
margin-top:8%;
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
<script type="text/javascript">
window.onload=write;

function write(){  
var numb=screen.width; 
 
document.getElementById("data").style.width="80%";
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
if(isset($_GET['time'])&&
isset($_GET['from']))
$tme=$_GET['time'];
$from=$_GET['from'];
$message=msg($me,$from);
echo "<div id='data'><button id='bck'>back</button><p>";

echo "<div id='print'><form name='FwD'><input type='hidden' id='mSg' value='$message'></form>";

echo "<h2>FORWARD MESSAGE:</h2><p><font color='red'>";
echo "$message";
echo "</font><p><input type='button' value='FORWARD' id='btn2' onclick='javascript:load()'><span id='Sent1'>&nbsp;</span></form><p>"; 

$select="select numb, name, sname from member JOIN messages ON member.numb=messages.sender where receiver=$me AND sender<>$from GROUP BY sender order by name Asc;";
$result = mysql_query($select); if(!$result) die(); 
$rows = mysql_num_rows($result);
echo "<a href='javascript:selctAll()'> Select All</a>";
echo "<form name='F2'><p><span id='ChckBx'>";

for($i=0; $i<$rows; ++$i){ 
$row = mysql_fetch_row($result); 
  echo "<p><input type='checkbox' id='place' value='$row[0]'>".$row[1]." ".$row[2]."<br />";
} echo "</span></form><div></div>";

function msg($x,$y){  
$select="select message from messages where receiver=$x and sender=$y ORDER BY stamp DESC LIMIT 1";
$result = mysql_query($select); if(!$result) die('error'); 
$rows = mysql_num_rows($result);
  for($i=0; $i<$rows; ++$i){  
     $row = mysql_fetch_row($result); 
           return $row[0];
}
}

?>
</head>
<body>
</body>
</html>