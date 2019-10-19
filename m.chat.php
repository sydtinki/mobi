<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>Text</title> 
<link rel='stylesheet' type='text/css' href='css/m.chat.css' />
<script type="text/javascript" async src="chatB.js"></script>
 
<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
  
  function queryMysql($query){

   $result = mysql_query($query) or die("ERR");
   return $result; }

if(isset($_GET['oponent']))
$sender=$_GET['oponent']; 
$update="update messages set status='read' where receiver=$me and sender=$sender";
echo "<form name='F1'><input type='hidden' name='sender' id='sender' value='$sender'></form>";     
echo "<form name='getMsgs'><input type='hidden' id='load' value='1'></form>";
$name=names($sender); $statement=statement($sender);
echo "<table border='0' width='300' id='tab' onMousedown='javascript:whichButton(event)'><tr><td id='menu'><img src='menu.png' width='25' height='25'></td><td id='name'>".$name."</td></tr><tr><td></td><td id='statement'><i>".$statement."<i></td><td id='online'></td></tr></table><p>";
echo "<div id='mobiTxtB'><textarea id='rplyVal' name='rplyVal' onkeyUp='javascript:fastRply()'></textarea><span id='sentB'></span><br><br>";
echo "<input type='button' id='replyBtn' value='send'></div>";

$idx=-1;
$snder=array();
$msg=array();
$stmp=array();
echo "<div id='data'>"; 
echo "<span id='messages'>&nbsp</span>";

echo "<center><span id='action'>&nbsp;</span></center><br><span id='TpMsg'>&nbsp;</span><br><span id='Resend'>&nbsp;</span><br><br>";
echo "<input type='text' name='msg' id='txtArea' onkeydown='javascript:fastSnd()' onclick='javascript:Quickreply()'><span id='sent'></span>";
echo "<input type='hidden' value='$sender' id='to' name='to'>";
echo "<span id='tail-container'></span><button id='sndBttn' onclick='javascript:postMsg()'>Send</button><br><input type='text' id='focs'  maxlength='0' onclick='javascript:reply()'></div></div>";

function names($x){  $select="select name, sname from member where numb=$x";
                        $result = mysql_query($select); if(!$result) die(mysql_error()); 
                        $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  $space="  ";
        $row = mysql_fetch_row($result); 
             return $row[0]. $space. $row[1];           }
}

 function statement($x){  $select="select statement from member where numb=$x";
                        $result = mysql_query($select); if(!$result) die(mysql_error()); 
                        $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  $space="  ";
        $row = mysql_fetch_row($result); 
             return  $space. $row[0];           }
}
echo "<div id='messageCache'>";
$select="select sender, message, stamp from messages where receiver=$me AND sender=$sender OR receiver=$sender AND sender=$me order by stamp ASC";
$result = mysql_query($select); if(!$result) die("something went wrong"); 
$rows = mysql_num_rows($result);
$beginAt=$rows-7;
for($i=0; $i<$rows; $i++){ $idx++; 
$row = mysql_fetch_row($result);                 
$snder[$idx]=$row[0];
$msg[$idx]="$row[1]";
$stmp[$idx]="$row[2]";
      }
if($rows>=8){
  for($i=$beginAt; $i<$rows; ++$i){ 

$color=colorful(names($snder[$i]),$name);
$date=colorfulB(names($snder[$i]),$name);

    echo "<span id='$color'><b>".names($snder[$i])."</b><br>-- $msg[$i]</span><br><span id=$date>".$stmp[$i]."</span><p>"; 
         } echo "<p><span id='white'>||||</span><p>"; }
if($rows<=7){
for($i=0; $i<$rows; ++$i){ 

$color=colorful(names($snder[$i]),$name);
$date=colorfulB(names($snder[$i]),$name);

echo "<span id='$color'><b>".names($snder[$i])."</b><br>-- $msg[$i]</span><br><span id=$date>".$stmp[$i]."</span><p>"; 
} echo "<p><span id='white'>||||</span><p>";
}

echo "</div>";
  
 function colorful($x,$y){ 
   $color1="incoming";
   $color2="outgoing";

     if($x!=$y){
   return $color2;         }
     else { return $color1;  
}
}
function colorfulB($x,$y){ 
   $color1="date";
   $color2="date1";

     if($x!=$y){
   return $color2;         }
     else { return $color1;  }
 }
     queryMysql($update); 

?>

</head>

<body>
<header> <div id="mnu"> <nav id="MobiNav"> <ul> 
<li><a href="javascript:reply()">Reply </a></li><br>
<li><a href="javascript:forward()">Forward</a></li><br>
<li><a href="javascript:backPage()">Back</a></li><br> 
<li><a href="javascript:help()">Help</a></li><br> 
<li><a href="javascript:about()">About</a></li><br>
<li><a href="javascript:shop()">Shoping</a></li> 
</ul></nav> 
</div> 
</header>
<div id="abt">
   <div id="abtTxt"> <u>Txt Application</u> is a text oriented chat room that allows users to chat over the internet. It is 
    accessible via various devices including smartphones, tablet, desktop or laptop.<p>

It is free and everyone is welcome. Enjoy! </div>

</div>
<div id="forward"><div id="forwardTxt">
</div></div>
<div id="shop"><div id="shopTxt"> Ads<p>
<span id="AdsContents"> </span>
</div>
</div>
<div id="Help"> 
<div id="hlpTxt">  <u> Log in </u> <p>
To log in enter your name and password then click on the log in button. Both your name and password have to be correct. Keep your password secret to those who you does not want to access your account. You can change your password whenever you want.

  <p> <u> Log out </u> <p>
To log out click on a log out link, you will then be directed to log in page where you can log in with your account or a different account.

 <p> <u> Account Update </u> <p>
You can change your name, surname, status, password except your Txt number. Select one of them and type in a new value in the textbox and click on update button. For example to change your password select password and enter new password in the textbox then click on update button. Make sure you choose the password that you will be able to remember.
</div>
</div>

<form name='F4'><input type='hidden' name='yOn' id='msgRecieved' value=''></form>
<form name='F8'><input type='hidden' id='loadPg' value='m.chatData.php'></form>
<form name='F9'><input type='hidden' id='type' value=''></form>

</body>
</html>