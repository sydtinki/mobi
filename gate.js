window.onload=gui;
var numb=screen.width;
var showpassClk=0;
var btnClk=0;

var xmlhttp = false;
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

function ajx(){  
try 
{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} 
catch(e)
{
try
{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} 
catch(E) 
{
xmlhttp = false;
}
}     
  
if(!xmlhttp && typeof XMLHttpRequest != 'undefined')
{
xmlhttp = new XMLHttpRequest();
} 
} 

function gui(){ 
setInterval('chckLog()',1000);
 
ajx(); 

//desktop
if(numb>=1280)
{ 
   
document.getElementById("pass").style.width="40%";
document.getElementById("name").style.width="40%";

}

//mobile
if(numb<1280)
{ 
document.getElementById("abt").style.display="none";
}

}

function Bck()
{
parent.window.location="index.php";
}

function UssdCreAcct(){

alert('contact your ISP');

//mobile
if(numb<1280)
{ 
window.location="tel:+26773462261";
}
}

function Go(f){
var error1="";  
if(F2.name.value=="" || F2.pass.value==""){ 
error1+="Enter both name and password to log in\n";
} 

if(error1==""){
var name = F2.name.value; 
var pass = F2.pass.value;
var prms = "?myusername="+name+"&mypassword="+pass;
var Page="checklogin.php"+prms;
var ID="err";   
makeGETrequest(Page, ID);  
}
if(error1!=""){ 
alert(error1); 
} 
}

function user(){
var E=document.getElementById("name");
E.value="";
E.style.color="red";
}

function Email(){
var E=document.getElementById("mail");
E.value="";
}


function Pass(){
var E=document.getElementById("pass");
E.value="";
E.type="password";
E.style.color="red";

setTimeout('view()',2000);
}

function view(){

document.getElementById("showpass").innerHTML="<a href='javascript:pass()'>Show Password</a><P>";
}

function retrieve(){ 

document.getElementById("abt").style.display="none";

    
document.getElementById("mobi").style.color="black";
document.getElementById("screen").innerHTML="<div id='write'><h1>Login Details </h1><form name='F2'>Enter your email address and click retrieve to get back your credentials.<br>Please provide the one you used to sign up or you changed after you signed up. </div><P><input type='text' size='20' name='maiL' id='mail' value='Email' onclick='javascript:Email()'><P><input type='button' value='retrieve' id='retrieveBtn' onclick='javascript:maiL()'></form> <br><input type='button' value='back' id='BckBtn' onclick='javascript:Bck()'><P>--";
                    
//desktop
if(numb>=1280)
{ 
document.getElementById("mail").style.width="40%";
}}

function maiL(){
if(F2.mail.value==""){ 
alert('No email was entered'); 
}
if(F2.mail.value!=""){ 

var M_address=F2.mail.value;
var prms ="?m_address="+M_address;
var Page="mail.php"+prms; 
var ID="screen";   
makeGETrequest(Page, ID); 
}
}

function makeGETrequest(serverPage, objID){  

var obj = document.getElementById(objID);  

xmlhttp.open("GET", serverPage,true);

xmlhttp.onreadystatechange = function() 
{

if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
if(xmlhttp.responseText !=null){ obj.innerHTML = xmlhttp.responseText; 
}
 
if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

obj.innerHTML =" "; }
}
}
xmlhttp.send(null); 

}

function trms(){   
document.getElementById("screen").innerHTML="<h1> Terms </h1><p><font face='courier new' size='2px'><b>By using this website you agree to the following: </b><p><ul> <li>The website belongs to its owners and therefore they are in control of the website's functionality which can be updated from time to time. </li><p><li>The harmful you can get from using this website is your responsibility if any.</li><p><li>Terms can be modified any time so you must be aware of this.</li><p><li>The website uses cookies for better user experience</li><p><p><li>We do not guarantee high level security and therefore there is possibility that the user`s information can be stolen.</li><p><li>You are not eligible to accept these terms or use our services if you are not of legal age to form a binding contract with us or if you are barred by law to use our services.</li> <a href='javascript:Bck()'> << Back </a></font>"; }

function pass(){ 
showpassClk++;

if(showpassClk==1){ 
document.getElementById("showpass").innerHTML="<a href='javascript:pass()'>Hide Password</a>"; 
document.getElementById("pass").type="text";
} 
if(showpassClk==2){ 
document.getElementById("showpass").innerHTML="<a href='javascript:pass()'>Show Password</a>"; 
document.getElementById("pass").type="password"; showpassClk=0;
}
}
function passLog(){ 
showpassClk++;

if(showpassClk==1){ 
document.getElementById("showpass").innerHTML="Hide password"; 
document.getElementById("txtBo1").type="text";
} 
if(showpassClk==2){ 
document.getElementById("showpass").innerHTML="Show password"; 
document.getElementById("txtBo1").type="password"; showpassClk=0;
}
}

function chckLog(){
var win=document.getElementById("err");
if(win.innerHTML=="loading"){ 
win.innerHTML=="done"; 
parent.window.location.href="m.conversations.php";
}
}
function contct(){ 
var mail="txtapplication@gmail.com"; 
alert('Email: \n'+mail); 
}