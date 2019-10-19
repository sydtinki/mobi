<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name]; 
 
  if(isset($_GET['msg'])&&
    isset($_GET['to'])&&
    isset($_GET['M_numb'])){     $msg=$_GET['msg'];  $receiver=$_GET['to']; $M_numb=$_GET['M_numb'];

  if($receiver=='' || $receiver==null){ 
     echo "error "; }
  if($receiver!='' || $receiver!=null){   $stamp=date('Y m d H i s a');
  if (get_magic_quotes_gpc()) 
{
  $msg = stripslashes($name);
}
$msg = mysql_real_escape_string($msg);

 $send="INSERT INTO messages VALUES('$M_numb','$msg','$receiver', '$me', '$stamp','22/06/15', 'unread')";  queryMysql($send); 
  echo "&nbsp; &#x2714; "; } }

 else { echo ".."; }

   function queryMysql($query){

   $result = mysql_query($query) or die("");
   return $result; }
?>