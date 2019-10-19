<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>Text</title>
<link rel='stylesheet' type='text/css' href='css/m.home.css' />
<script type="text/javascript" async src="home.js"></script>
<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if($_COOKIE[$cookie_name]==""){header("location:index.php");}

$select="select sender, message, MAX(stamp) as time, receiver from messages where receiver=$me GROUP BY sender ORDER BY time DESC";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
$name=names($me);  
$statement=statement($me);
echo "<table border='0' width='300' id='tab' onMousedown='javascript:whichButton(event)'><tr><td id='menu'><img src='menu.png' width='25' height='25'></td><td id='name'>".$name."</td></tr><tr><td></td><td id='statement'><i>".$statement."<i></td><td id='inbox'>&nbsp;</td></tr></table><p>";
echo "<div id='mobiTxtB'><input type='text' size='12' id='mobiTo' onclick='javascript:emptyMobiTo()'><br><br><textarea id='mobiMsgB'></textarea><span id='sentB'></span><br><br>";
echo "<input type='button' id='mobiSndBtn' value='send' onclick='javascript:mobiCompse()'></div>";

echo "<div id='data'>";

for($i=0; $i<$rows; ++$i){    
   $row = mysql_fetch_row($result); 
   echo "<input type='button' onclick='javascript:openChatPg($row[0])' value='".names($row[0])."' id='Bee'></a></b><br /><span id='date'>".$row[2]."</span><p>".lastmsg($row[0],$me,$me)."<p><p>";
}

   echo "<span id='bottomad'><p><span id='adsContents'>...</span></span></div>"; 

function names($x){  
$select="select name, sname from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0]." ". $row[1];           }
 }

function status($x,$y){ 
$select="select status from messages where sender=$x AND receiver=$y";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0];}

 }
function statement($x){  
$select="select statement from member where numb=$x";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  $space="  ";
        $row = mysql_fetch_row($result); 
             return  $space. $row[0];}
 }
function lastmsg($x,$y,$num){ $my_num=$num;

$select="select status, SUBSTRING(message,1,45), receiver, sender from messages where sender=$x AND receiver=$y OR sender=$y AND receiver=$x ORDER BY stamp DESC LIMIT 1";
$result = mysql_query($select); if(!$result) die(mysql_error()); 
$rows = mysql_num_rows($result);
                        
for($i=0; $i<$rows; ++$i){  
   $row = mysql_fetch_row($result);   $color=colorful($row[0],$row[2]);  
if($row[3]==$my_num){ $space="  ";  $arrw=$space." ";   $row[1].=$arrw; }
else { $space="  ";  $arrw=$space." ::";  $row[1].=$arrw; }
    return "<span id='$color'>".$row[1]."</span>";       
}   
}

function colorful($x,$y){ 
   $color1="unread";
   $color2="read";
     if($x=="unread"){
        if($y==$me){
   return $color1; 
} }

else { return $color2;  
}
}
        
?>

</head>
<body>
<header> <div id="mnu"><nav id="MobileNav"> 
  <table border='0' id='tableMnu'><tr>
<td id='first'>

<ul><li><a href="javascript:compose();">Compose</a>
</li><br> 
<li><a href="smart.php">Send Multiple</a>
</li><br>
<li><a href="unread.php">New Message(s)</a>
</li><br>
<li><a href="javascript:serch()">Search</a>
</li><br>
<li><a href="contacts.php">Contacts</a>
</li><br>
<li><a href="activeUsers.php">Active User(s)</a>
</li><br>
<li><a href="sent.php">Sent</a>
</li><br>
</td>

<td>
<li><a href="history.php">History</a>
</li> <br>
<li><a href="javascript:DelteAll()">Delete All</a>
</li><br>
<li><a href="javascript:accUpdate()">Account Update </a>
</li><br>
<li><a href="javascript:about()">About</a>
</li><br>
<li><a href="javascript:shop()">Shoping</a>
</li><br>
<li><a href="javascript:menu()">Close</a>
</li><br>
<li><a href="logout.php">Logout </a></li>                  
</ul>

</tr></td></table>

</nav></div></header>
<div id="sendNew">
<form name="CpmseMsg">
<b id="compLabel"><P>Compose Message</b><p>
<input type="text" size="12" id="to" name="to" onclick="javascript:empty()"><p>
<textarea id="msgBody" name="msgBody" onclick="javascript:emptymsgBody()"></textarea><span id="sentB"></span>
<p><input type="button" value="send" id="snd" onclick="javascript:Compse()">
</form> 
</div>

<div id="sendMul"><div id="sendMulFrm">
<form name="SndMul">
<input type="text" id="sendMulBody" name="sendMulBody" onclick="javascript:emptysendMulVal()"> 
<input type="button" value="send" id="btn2" onclick="javascript:load()"><span id='sent'>&nbsp;</span></form><form name='F2'><p><span id="ChckBx">&nbsp;</span></form>
</div></div>

<div id="search"><div id="searchFrm">
<form name="srch" action="" method="POST">
<b>Search</b><p>
<input type="text" id="searchVal" name="searchVal" onclick="javascript:emptysearchVal()" onkeyUp="javascript:serchC(this.form)">
<p><input type='button' value='Go!' id='go' onclick='javascript:SerchBtn(this.form)'>
</form><span id="sData">&nbsp;</span></div></div>
<div id="update"> <div id="updateBdy">  <b> Account Update </b> <p>

Edit: 
<form name="updte" action="m.update.php" method="POST">
<input type="radio" name="choose" id="option1" value="name" onchange="javascript:HideButn()">
<a href="javascript:Updating('option1')">Name </a><br /><br>

<input type="radio" name="choose" id="option2" value="sname" onchange="javascript:HideButn()">
<a href="javascript:Updating('option2')">Surname </a><br /><br>

<input type="radio" name="choose" id="option3" value="state" onchange="javascript:HideButn()">
<a href="javascript:Updating('option3')">Status </a><br /><br>

<input type="radio" name="choose" id="option5" value="mail" onchange="javascript:HideButn()">
<a href="javascript:Updating('option5')">Email </a><br /><br>

<input type="radio" name="choose" id="option4" value="pass" onchange="javascript:BtnVisible()">
<a href="javascript:Updating('option4')">Password </a><br /><br>

<input type="text" size="19" name="newVal" id="upDteTxtBx">
<p><button id="updteBtn"> update </button>  <p><input type="button" id="HideBtn" value="hide" onclick="javascript:ChangeBtn(this.form)">

</form></div> 
</div>
<div id="abt">
<div id="abtTxt"> <u>Txt Application</u> is a text oriented chat room that allows users to chat over the internet. It is 
    accessible via various devices including smartphones, tablet, desktop or laptop.<p>

It is free and everyone is welcome. Enjoy! <p>
<a href="javascript:shareSms()">Share :.</a><p>
<a href="javascript:reqHelp()">Help</a><p>
 </div></div>
<div id="shop"><div id="shopTxt"> Ads<p>
<span id="AdsContents"><a target="_blank" href="http://shareasale.com/r.cfm?b=940899&u=1476359&m=62897&urllink=&afftrack="><img src="http://static.shareasale.com/image/62897/250-250_04.jpg" border="0" alt="style me 250-250" /></a></span>
</div>
</div>

<div id="DeleteIt">
<div id='deleteAll'><span id='delete'><a href='javascript:DelteAll()'>Delete_All</a></span><p>
</div></div>

<div id="adsCache" style="display:none"></div>
</body>
</html>