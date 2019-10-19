<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name]; 

 $dbserver = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
 mysql_select_db($dbname) or die(mysql_error());

 function queryMysql($query){ 
    $result = mysql_query($query) or die("sending failed");
    return $result; }

  if(isset($_POST['msgBody'])&&
    isset($_POST['to'])&&
    isset($_POST['M_numb'])){     
$msg=$_POST['msgBody'];  
$receiver=$_POST['to']; 
$M_numb=$_POST['M_numb'];

$numCorrct=validTxtNum($receiver);

  if($receiver=='' || $receiver==null){ 
     echo "error "; }

  if($receiver!='' || $receiver!=null){   $stamp=date('Y m d h i s');

  if (get_magic_quotes_gpc()) 
{
  $msg = stripslashes($name);
}
$msg = mysql_real_escape_string($msg);
  
if($numCorrct!=0){ echo"Invalid Txt Number"; }
if($numCorrct==0){
 $send="INSERT INTO messages VALUES('$M_numb','$msg','$receiver', '$me', '$stamp','22/06/15', 'unread')";
 queryMysql($send); 
 
  header("location:m.chat.php?oponent=$receiver"); } } }

function validTxtNum($x){
$count="select count(numb) from member where numb=$x"; 
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

?>