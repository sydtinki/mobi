<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>Send Multiple</title>

<style>
a{color:red;
}
#data{
margin-left:4%;
}
h2{
color:#000058;
}
#sendMulBody{
width:60%;
margin-left:5%;
height:30mm;
font-size:15px;
}
#btn{
margin-left:60%;
width:12mm;
height:12mm;
color:gray;
background:#fffcff;
border:solid red 1px;
-moz-border-radius:50px;
-webkit-border-radius:50px;
border-radius:50px;
}
#sent{
color:red;
}
#bck{
width:20%;
}
</style>
<script type="text/javascript">
function ba(){
history.back();
}
</script>
<script type="text/javascript" async src="smart.js"></script>

<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if($_COOKIE[$cookie_name]==""){header("location:index.php");}

$select="select numb, name, sname from member JOIN messages ON member.numb=messages.sender where receiver=$me GROUP BY sender order by name Asc;";
$result = mysql_query($select); if(!$result) die(); 
$rows = mysql_num_rows($result);


echo "<div id='data'><button onclick='javascript:ba()' id='bck'>Back</button><p><h2>Send Multiple</h2><div id=sendMul><div id=sendMulFrm>";

echo "<form name=SndMul>";
echo "<textarea id='sendMulBody' name='sendMulBody' onclick='javascript:emptysendMulVal()'> type message</textarea>";
echo "<P><input type='button' value='send' id='btn' onclick='javascript:load()'><span id='sent'>&nbsp;</span></form><form name='F2'><p>";
echo "</div></div>";

echo "<a href='javascript:selctAll()'> Select All</a><form name='F2'>";

  for($i=0; $i<$rows; ++$i){ 

           $row = mysql_fetch_row($result); 
           echo "<p><input type='checkbox' id='place' value='$row[0]'>".$row[1]." ".$row[2]."<br />";
            }echo "</form></div>";

?>
</head>
<body>


</body>
</html>