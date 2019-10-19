<?php
require_once 'log_in.php';
if(isset($_GET['myusername'])&&
isset($_GET['mypassword']))
$tbl_name="member";

$myusername=$_GET['myusername'];
$mypassword=$_GET['mypassword'];
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword); 

$sql="SELECT * FROM $tbl_name WHERE numb=$myusername and
pass='$mypassword'";
$result=queryMysql($sql);
$count=mysql_num_rows($result);
if($count==1){
$iD=myId($myusername,$mypassword);
$cookie_name = "userID";
$cookie_value =$iD;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 

echo "loading";  
}

else{

echo "<font color='red'>wrong password/username</font>";}

function myId($nam,$pas){
$select="select numb from member where numb='$nam' AND pass='$pas'";
 $result = mysql_query($select); 
   $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
  $row = mysql_fetch_row($result); 
    return $row[0]; }

}
function queryMysql($query){ 
    $result = mysql_query($query) or die("<font color='red'>Login failed - check your name and password and <a href='index.php'>try again</a></font>");
    return $result; }
?>