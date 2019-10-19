<?php
include_once 'log_in.php';
if(isset($_GET['name'])&&
isset($_GET['sname'])&&
isset($_GET['pass'])&&
isset($_GET['mail'])&&
isset($_GET['M_numb']))
    
$name = sanitizeString($_GET['name']);
$sname = sanitizeString($_GET['sname']);
$pass = sanitizeString($_GET['pass']);
$mail = sanitizeString($_GET['mail']);
$m_numb=$_GET['M_numb'];
$m_numb1=$m_numb."Q";
$passTaken=passUserbility($pass);

$defaultStatement = "I use Txt application";
$welcome="Welcome to Txt Application. Tell friends to let them sign up too and get connected with this fast, beautiful, and low data consuming application. Ideal for one on one chat.";
$join="INSERT INTO member VALUES(null,'$name','$sname','$pass','$mail','$defaultStatement')"; 

 if($name && $sname && $pass && $mail !="" && $passTaken==1){

queryMysql($join); echo "<center><h3><u>Account created</u></h3><p>";
echo"Your Login Details are as follows:<p>";
echo"<b>Username:</b> $name<br><b>Password:</b> $pass<p><i>Please keep them save as you will need them whenever you want to sign in.</i><p><a href='javascript:logIn()'>Log in now</a></center>";
$newId=getNewUserNum($name,$sname,$pass); $secondMsg="Your Txt number is $newId, share it with your friends to connect.";
$stamp=date('Y m d h i s');
$send="INSERT INTO messages VALUES('$m_numb','$welcome','$newId', 1, '$stamp','22/06/15', 'unread')"; 
$send1="INSERT INTO messages VALUES('$m_numb1','$secondMsg','$newId', 1, '$stamp','22/06/15', 'unread')"; 
queryMysql($send);queryMysql($send1);
   } 
if($name && $sname && $pass && $mail ==""){ echo "Please enter all the fields and make sure internet connection persist"; } 
if($passTaken!=1){ echo "This password is already in use please create a unique password<p><a href=''>Return</a>";}
 

function getNewUserNum($x,$y,$z){
$select="select numb from member where name='$x' AND sname='$y' AND pass='$z'"; 
                        $result = mysql_query($select); if(!$result) die(mysql_error()); 
                        $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return  $row[0];           }
 }
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

function queryMysql($query){

$result = mysql_query($query) or die("");
return $result; 
}

 ?>