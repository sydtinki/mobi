<?php
require_once 'log_in.php';
if(isset($_GET['m_address']))

$to=$_GET['m_address'];
$subject="Txt Application - Login Details";
$message=msg($to);
if($message!=""){mail($to,$subject,$message);
echo "sent - please make sure your email is valid";}

if($message==""){
echo "Invalid email - check your spelling and <a href='index.php'>try again</a>";}

function msg($x){  
$select="select name, pass from member where mail='$x'";
$result = mysql_query($select); if(!$result) die('error'); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return "Name: ".$row[0]."  Password: ".$row[1];
}
}
?>