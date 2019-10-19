<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>Txt Application-Update</title>
<link rel='stylesheet' type='text/css' href='css\m.update.css' />
<script type="text/javascript" async src="m.update.js"></script>

<?php
include_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
$err="";

 $dbserver = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
 mysql_select_db($dbname) or die(mysql_error());

 
 function queryMysql($query){

   $result = mysql_query($query) or die(mysql_error());
   return $result; }

  if(isset($_POST['choose'])&&
    isset($_POST['newVal'])){

$detail=$_POST['choose'];
$newval=$_POST['newVal'];
$passTaken=passUserbility($newval);


if($detail=="name"){

if($newval!=""){
  
   $update="UPDATE member SET name= '$newval' WHERE numb=$me"; queryMysql($update);
}
if($newval==""){
$err.="<br>No name was entered";
}
}

if($detail=="sname"){
if($newval!=""){
  
   $update="UPDATE member SET sname= '$newval' WHERE numb=$me"; queryMysql($update); 
}
if($newval==""){
$err.="<br>No surname was entered";
}
}

if($detail=="state"){
if($newval!=""){
  
   $update="UPDATE member SET statement= '$newval' WHERE numb=$me"; queryMysql($update); 
}
if($newval==""){
$err.="<br>No status was entered";
}
}
  
if($passTaken!=1){ $err.="<br>Password unchanged it is already in use please create a unique password";  }

if($passTaken==1 && $detail=="pass"){
if($newval!=""){ 
   $Nowupdate="UPDATE member SET pass= '$newval' WHERE numb=$me";  queryMysql($Nowupdate);  
}
if($newval==""){
$err.="<br>Please set new password";
}}

if($detail=="mail"){
if($newval!=""){
  
   $update="UPDATE member SET mail= '$newval' WHERE numb=$me"; queryMysql($update); 
}
if($newval==""){
$err.="<br>No email was entered";
}
} 

}

  $select="select name, sname, numb, statement, pass, mail from member where numb=$me";
 $result = mysql_query($select); if(!$result) die(mysql_error()); 
 $rows = mysql_num_rows($result);

function passUserbility($x){
$count="select count(pass) from member where pass='$x'"; 
$result = mysql_query($count);  
$rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return 0; }
      if($row[0]==0){
        return 1; 
} 
} 

}
              
echo "<center><h3>";
echo "Update Done";
echo "</center></h3><p>";

 for($i=0; $i<$rows; ++$i){  
   $row = mysql_fetch_row($result);   
       echo "<center> <table border='1' id='data'> <tr><td><b>Name:</b> $row[0]</td></tr><tr><td><b>Surname:</b> $row[1]</td></tr><tr><td><b>Txt number:</b> $row[2]</td></tr><tr><td><b>Status:</b> <i>$row[3]</i></td></tr><tr><td><b>Password:</b> $row[4]</td></tr><tr><td><b>Email:</b> $row[5]</td></tr></table> </center>";  

 }echo "<center>$err</center>";

 ?>

</head>
<body> <p>

 <center> <input type="button" value="Chats" onclick="javascript:backPage()" id="BackBtn"> </center>
</body>
</html>