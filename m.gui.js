window.onload=gui;
var numb=screen.width;
var showpassClk=0;
var btnClk=0;
var wdth=0.22*numb*1;
var units="mm";
var BtnWdth = 64.55477172900306/100*wdth;
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

try {
            
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} 
catch (e) 
{
       
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

} 
catch(E) 
{
xmlhttp = false;
}
}     
  
if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){

xmlhttp = new XMLHttpRequest();
} 
} 

function gui(){ 
setInterval('chckLog()',1000);
 
document.getElementById("btn").style.width=BtnWdth+units;    
document.getElementById("btn1").style.width=BtnWdth+units;
ajx(); 
}

function Bck()
{
parent.window.location="index.php";
}

function UssdCreAcct(){
 alert('contact your ISP');
}

function logIn(){
 
var txtBwdth = 64.55477172900306/100*wdth;  var btnWdth1 = 19.29988020764009/100*wdth;   
document.getElementById("mobi").style.color="black";
document.getElementById("screen").innerHTML="<h1>Log In </h1><form name='F2'> Number <input type='text' size='20' name='fname' id='txtBo'> <p>Password <input type='password' size='20' name='pass' id='txtBo1'><p><a href='javascript:passLog()' id='showpass'>Show password</a><p><a href='javascript:retrieve()' id='credentials'>Forgot Credentials?</a><p><input type='button' id='LogBtn' value='GO!' onclick='javascript:alrt1(this);'></form> <br><input type='button' value='back' id='BckBtn' onclick='javascript:Bck()'><p>--";
document.getElementById("txtBo").style.width=txtBwdth+units; 
document.getElementById("txtBo1").style.width=txtBwdth+units                     
document.getElementById("BckBtn").style.width=btnWdth1+units;                                        
document.getElementById("LogBtn").style.width=btnWdth1+units;
}
function retrieve(){
 
var txtBwdth = 64.55477172900306/100*wdth;  var btnWdth1 = 19.29988020764009/100*wdth;   
document.getElementById("mobi").style.color="black";
document.getElementById("screen").innerHTML="<h1>Login Details </h1><form name='F2'><b>Email</b> <input type='text' size='20' name='mail' id='txtBo'><p>Enter your email address and click retrieve to get back your credentials.<br>Please provide the one you used to sign up or you changed after you signed up.<P><input type='button' value='retrieve' id='retrieveBtn' onclick='javascript:maiL()'></form> <br><input type='button' value='back' id='BckBtn' onclick='javascript:Bck()'><P>--";
document.getElementById("txtBo").style.width=txtBwdth+units;                       
document.getElementById("BckBtn").style.width=btnWdth1+units;                                        
document.getElementById("retrieveBtn").style.width=btnWdth1+units;                     
}

function alrt1(f){ 
var error1="";  
if(F2.fname.value=="" || F2.pass.value==""){ 
error1+="Enter both name and password to log in\n";
} 

if(error1==""){
var name = F2.fname.value; 
var pass = F2.pass.value;
var prms = "?myusername="+name+"&mypassword="+pass;
var Page="checklogin.php"+prms;
var ID="screen";   
makeGETrequest(Page, ID);  
}
if(error1!=""){ alert(error1); 
} 
}

function maiL(){
if(F2.mail.value==""){ alert('No email was entered'); 
}
if(F2.mail.value!=""){ 

var M_address=F2.mail.value;
var prms ="?m_address="+M_address;
var Page="mail.php"+prms; 
var ID="screen";   makeGETrequest(Page, ID); 
}
}

function makeGETrequest(serverPage, objID) {  

var obj = document.getElementById(objID);  

xmlhttp.open("GET", serverPage,true);

xmlhttp.onreadystatechange = function() 
{

if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
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

if(showpassClk==1){ document.getElementById("showpass").innerHTML="Hide password"; document.getElementById("txtB3").type="text";} if(showpassClk==2){ 
document.getElementById("showpass").innerHTML="Show password"; document.getElementById("txtB3").type="password"; showpassClk=0;}
}
function passLog(){ 
showpassClk++;

if(showpassClk==1){ document.getElementById("showpass").innerHTML="Hide password"; document.getElementById("txtBo1").type="text";} if(showpassClk==2){ 
document.getElementById("showpass").innerHTML="Show password"; document.getElementById("txtBo1").type="password"; showpassClk=0;}
}

function chckLog(){
var win=document.getElementById("screen");
if(win.innerHTML=="loading"){ win.innerHTML=="done"; parent.window.location.href="m.conversations.php";}
}
function contct(){ 
var mail="txtapplication@gmail.com"; 
alert('Email: \n'+mail); 
}