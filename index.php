<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="format-detection" content="telephone=no">
<meta name="msapplication-tap-highlight" content="no">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="manifest" href="/manifest.json">

<script type="text/javascript" src="gate.js">
</script>
<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if($_COOKIE[$cookie_name]!=""){header("location:m.conversations.php");
} 
?>
<title>Txtapplication Home</title> 
<meta name="description" content="Login to your txtapplication account">

</head>
<body id="mobi">
<div id="data"><div id="screen">
<p>

<h1><center>Txt Application</center></h1><p>

<p>

<form name="F2"><input type="text" id="name" maxlength="10" value="Username" onclick="javascript:user()">

<p><P>

<input type="text" id="pass" maxlength="30" value="Password" onclick="javascript:Pass()"><p>
   
<span id="err"></span><P>

<input type="button" onclick="javascript:Go(this)" id="LoginBtn" value="Login"></form><p>


<div id="showpass"></div><P>

<a href="javascript:retrieve()" id="retrieve">Forgot password/username</a><p>

<a href="javascript:UssdCreAcct()" id="join">Register</a><p>

<div id='links'>
<a href='javascript:contct()'>Contact</a>
<p><a href='feedback.html'>Feedback</a>
<p><a href='helpCenter.php'>Help</a>
</div>
     

</div></div>

 <div id="abt">
<div id="abtTxt"> <u>Txt Application</u> is a text oriented chat room that allows users to chat over the internet. It is 
    accessible via various devices including smartphones, tablet, desktop or laptop.<p>

It is free and everyone is welcome. Enjoy! <p>

 </div></div>
</body>
    </html>