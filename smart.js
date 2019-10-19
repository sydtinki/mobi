window.onload=write;
var numb=screen.width;
var clk=0; 
var clic=0; 
var txtBclic=0;
var xmlhttp = false; 
nocache = ""+Math.random()*1000000; 
var receivers = new Array();
var id=-1;
var clk1=-1;
var btnClk=-1;
var Pidx=-1;
var ServPage = new Array();
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

   } catch (e) {

     try {
             //If we are using Internet Explorer.

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

         } catch (E) {
                  xmlhttp = false;
}
}
  
 if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

      xmlhttp = new XMLHttpRequest();
} 

   }   

function write(){ 
         
if(numb<1280){ 
//mobile

document.getElementById("sendMulBody").style.width="90%";
document.getElementById("btn").style.width="25%";

} 
ajx(); 
 
}

function makeGetrequest(serverPage, objID) 
{  

          var obj = document.getElementById(objID);

  xmlhttp.open("GET", serverPage,nocache,true);

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText !=null){ obj.innerHTML = xmlhttp.responseText; }
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

          obj.innerHTML =this.statusText; }
}
}
 xmlhttp.send(null); 

 }
  function sndMulrequest(serverPage) 
{  

          var obj = document.getElementById("sent");

  xmlhttp.open("GET", serverPage, true);

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText !=null){ 

 obj.innerHTML = xmlhttp.responseText;  }
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

          obj.innerHTML =""; }
}
}
 xmlhttp.send(null); 

 }
function emptysendMulVal()
{ 
txtBclic++;
var txtArea = document.getElementById("sendMulBody");

if(txtBclic==1)
{
txtArea.innerHTML="";
txtArea.style.color="#000055";
}
 
}
function load()
{ 
btnClk++; var len =F2.place.length; 
var msg=document.getElementById("sendMulBody").value;
for(i=0; i<len; i++){ 

if(F2.place[i].checked==true){
 
getVal(F2.place[i].value); }  } 

if(btnClk==0){ 
if(receivers.length==0){
alert('Select 2 or more recipients'); btnClk=-1; 
} 
 
if(receivers.length>0 && msg!=""){ postMsg();
} 
} 

if(msg==""){ alert('Type message'); 
}

if(btnClk>=1){ alert('To send message again, \nreload page'); 
}
}

function getVal(a){ 
id++;

receivers[id]=a; 
}

function postMsg(){   
var msgVal=document.getElementById("sendMulBody").value; 
for(i=0; i<receivers.length; i++){

var getletter1 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter2 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter3 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter4 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter5 = letter1[Math.floor(Math.random()*letter1.length)]; 
var m_numb=getletter1+getletter2+getletter3+getletter4+getletter5; 

var prms = "?msg="+msgVal+"&to="+receivers[i]+"&M_numb="+m_numb;       
var Page="m.SendMul.php"+prms;

ServPage[i]=Page; 
} MsgQue();
}

function MsgQue(){ 

setInterval('delay()',250); 
document.getElementById("sent").innerHTML="sending"; 
}

function delay(){ 
Pidx++; 
  
if(Pidx<ServPage.length-1){  
sndMulrequest(ServPage[Pidx]); 
}

if(Pidx==ServPage.length-1){ 
alert('done'); 

sndMulrequest(ServPage[ServPage.length-1]); 

document.bgColor="#9cd6B1";

setTimeout('Home()',2000);
}
}

function Home(){
parent.window.location="m.conversations.php";
}

function selctAll(){ 
clk1++; 
  
var len =F2.place.length; 

if(clk1==0){

for(i=0; i<len; i++)
{
F2.place[i].checked="true"; 
} 
}

if(clk1==1){

alert('selected');  
clk1=-1; 
}

}

