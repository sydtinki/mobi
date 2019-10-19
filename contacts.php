<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<title>contacts</title>
<style type="text/css">
#data{
position:absolute;
color:black;
margin-left:6mm;
text-align:justify;
font-size:14px;
width:70mm;
}
a{
color:red;
}
a:hover{
color:orange;
}
a:visited{
color:red;
}
body{
background:white;}
#bck{
width:40%;
}
#msgBody{
width:90%;
height:30mm;
font-size:15px;
}
#snd{
width:90%;
font-size:14px;
height:8mm;
color:gray;
background:#fffcff;
border:solid black 1px;
}
#mobiTo{
margin-left:5%;
width:90%;
height:10mm;
font-size:15px;
color:red;
border:solid gray 1px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
border-radius:10px;
}
#to{
width:90%;
height:10mm;
font-size:15px;
color:red;
border:solid gray 1px;
-moz-border-radius:10px;
-webkit-border-radius:10px;
border-radius:10px;
}
</style>
<script type="text/javascript">
window.onload=write;

var xmlhttp = false; 
nocache = ""+Math.random()*1000000; 
var mnumB="";
var msStore="";
var toWho="";

var letter1 = new Array();
letter1[0]="A";
letter1[1]="B";   
letter1[2]="C";
letter1[3]="D";   
letter1[4]="E";
letter1[5]="F";   
letter1[6]="G";
letter1[7]="H";   
letter1[8]="I";
letter1[9]="J";
letter1[10]="K";
letter1[11]="L";
letter1[12]="M";
letter1[13]="N";
letter1[14]="O";
letter1[15]="P";
letter1[16]="Q";
letter1[17]="R";
letter1[18]="S";
letter1[19]="T";
letter1[20]="U";
letter1[21]="V";
letter1[22]="W";
letter1[23]="X";
letter1[24]="Y";
letter1[25]="Z";
letter1[26]="a";
letter1[27]="b";
letter1[28]="c";
letter1[29]="d";
letter1[30]="e";
letter1[31]="f";
letter1[32]="g";
letter1[33]="h";
letter1[34]="i";
letter1[35]="j";
letter1[36]="k";
letter1[37]="l";
letter1[38]="m";
letter1[39]="n";
letter1[40]="o";
letter1[41]="p";
letter1[42]="q";
letter1[43]="r";
letter1[44]="s";
letter1[45]="t";
letter1[46]="u";
letter1[47]="v";
letter1[48]="w";
letter1[49]="x";
letter1[50]="y";
letter1[51]="z";

function write(){  
var numb=screen.width; 
var wdth=0.20*numb*1;
var units="mm";
document.getElementById("data").style.width=wdth+units;
document.getElementById("bck").onclick=back;
if(numb>=1280) 
{   //desk
document.getElementById("data").style.left=15+"%";

document.getElementById("to").style.width=40+"%";
document.getElementById("snd").style.width=40+"%";
document.getElementById("msgBody").style.width=40+"%";
}
if(numb<=1280) 
{  //mobile  
document.getElementById("data").style.left=5+"%";
}
ajx();
}

function ajx(){    
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

 } catch (e) {

try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

         } catch (E) {
                  xmlhttp = false;
}
}
  
 if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

      xmlhttp = new XMLHttpRequest();
} 
    
   }   
     
function back(){
history.back();
}
function Compse(){ 

var msgVal=document.getElementById("msgBody").value;
var To=document.getElementById("to").value;
var getletter1 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter2 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter3 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter4 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter5 = letter1[Math.floor(Math.random()*letter1.length)]; 
var m_numb=getletter1+getletter2+getletter3+getletter4+getletter5;

mnumB=m_numb;
msStore=msgVal;
toWho=To;

if(To==""){ alert('Enter receiver`s Txt number'); }

var flag=0;

if(To>0){ 
flag++;

}

if(flag==0 && To!=""){ 
alert('Invalid Entry'); 
return true;
}
if(To!=""){ 
var state=document.getElementById("statement");

setInterval('Comps()',1500); 
state.innerHTML="<h4>sending..</h4>";
state.style.color="green";
setTimeout('wait()',5000); 
}  
}

function wait(){ 
openChat(toWho);

}

function openChat(x){ 
parent.window.location='m.chat.php?oponent='+x;

}
function Comps(){

var prms = "?msg="+msStore+"&to="+toWho+"&M_numb="+mnumB;       
var Page="m.send.php"+prms;
var ID="sentB";
makeGetrequest(Page,ID); 
}

function emptymsgBody(){ 
var txtArea = document.getElementById("msgBody");
txtArea.value="";
txtArea.style.color="#000055";
 
}

function empty(){
document.getElementById("to").value="";
}

function makeGetrequest(serverPage, objID) {  

          var obj = document.getElementById(objID);

  xmlhttp.open("GET", serverPage,nocache,true);

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText !=null){ obj.innerHTML = xmlhttp.responseText;setTimeout('ClearTick()',2000); }
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

           }
}
    }
 xmlhttp.send(null); 

 }
</script>

<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if(isset($_GET['time']))
$tme=$_GET['time'];
$select="select numb, name, sname from member JOIN messages ON member.numb=messages.sender where receiver=$me GROUP BY sender order by name Asc";
$result = mysql_query($select);  
$rows = mysql_num_rows($result);

echo "<div id='data'><button id='bck'>back</button><p>";

for($i=0; $i<$rows; ++$i){   
$row = mysql_fetch_row($result);
echo "<b><a href='m.chat.php?oponent=$row[0]'>".$row[1]." ".$row[2]."</b></a><p>"; }

if($rows<2){
echo "<h1><font color='#000058'>Start Chat</font></h1><p>";

echo "<form name='CpmseMsg'>";
echo "<input type='text' size='12' id='to' name='to' value='Txt number' onclick='javascript:empty()'><p>";
echo "<textarea id='msgBody' name='msgBody' onclick='javascript:emptymsgBody()'>type message</textarea><span id='sentB'></span>";
echo "<p><input type='button' value='send' id='snd' onclick='javascript:Compse()'>";
echo "</form><p><div id='statement'></div>";
}

echo "</div>";
?>
</head>
<body>

</div>
</body>
</html>