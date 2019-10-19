<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name]; 

$dbserver = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

function queryMysql($query){ 
    $result = mysql_query($query) or die("");
    return $result; }

if(isset($_GET['msg'])&&
isset($_GET['to'])&&
isset($_GET['M_numb'])){     
$msg=$_GET['msg'];  
$receiver=$_GET['to']; 
$m_numb=$_GET['M_numb'];

$today=date('Y m d H i s a');

$clear="delete from unkwon where expires=$today OR expires<$today";
$cleared = mysql_query($clear);

$numCorrct=validTxtNum($receiver);

  if($receiver=='' || $receiver==null){ 
     echo "error "; }

  if($receiver!='' || $receiver!=null){   $stamp=date('Y m d H i s a'); $time=time(); 

  if (get_magic_quotes_gpc()) 
{
  $msg = stripslashes($msg);
}
$msg = mysql_real_escape_string($msg);
if($numCorrct!=0){ 

$current_year=date('Y');
$current_mnth=date('m');
$next_mnth=$current_mnth+1;
$exp=date(' H i s a'); 

if($next_mnth<10){
$next_mnth='0'.$next_mnth;
}

if($next_mnth==13){
$next_mnth='01';
$current_year++;
}

$expires="$current_year $next_mnth 15";
$expires.=$exp;

$send="INSERT INTO unkwon VALUES('$m_numb','$receiver','$me','$msg', '$expires','$stamp')";  
queryMysql($send); 


$qry="INSERT INTO notification1 VALUES('$me','$receiver')";  
queryMysql($qry);

}
if($numCorrct==0){
$send="INSERT INTO messages VALUES('$m_numb','$msg','$receiver', '$me', '$stamp','$time', 'unread')";  
queryMysql($send); 
echo "&#9788"; 

$olne=active_user($receiver); 

if($olne=="off"){

$notify="INSERT INTO notification VALUES('$me','$receiver')";
queryMysql($notify); 
}

} 
} 
}

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

 function active_user($x){     
  $count="select count(tme) from status where oponent=$x"; 
  $result = mysql_query($count);  
  $rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "on"; }
      if($row[0]==0){
        return "off"; } }  
     }

?>