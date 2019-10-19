<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>search</title>
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
background:white;
}
</style>
<script>
window.onload=write;

function write(){  
var numb=screen.width;
var wdth=0.20*numb*1;
var units="mm";
document.getElementById("data").style.width=wdth+units;
if(numb>=1280)
{   
document.getElementById("data").style.left=15+"%";
}
}

</script>

<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];

 if(isset($_GET['name']))
    $name=$_GET['name'];

$select="SELECT numb,name,sname from member where name like'%$name%' UNION SELECT numb,name,sname from member where sname like'%$name%'";
$result = mysql_query($select); if(!$result) die(mysql_error("Results not found")); 
$rows = mysql_num_rows($result);
echo "<div id='data'>";

for($i=0; $i<$rows; ++$i){  
$row = mysql_fetch_row($result);

if($row[0]!=$me){
echo "<a href='m.chat.php?oponent=$row[0]'>$row[1] $row[2]</a><p>"; 
} 
}       
echo "</div>";
?>
</head>
<body>
</body>
</html>