window.onload=write;
var control=0;
var clicM=0; // mobile reply textarea click count
var rlpyLink=0; // reply link click count
var numb=screen.width;
var clk=0;
var LeftClkcount=-1;
var receivers = new Array();
var id=-1;
var clk1=-1;
var btnClk=-1;
var Pidx=-1;
var ServPage = new Array();
var months=new Array();
months[0]="Jan";
months[1]="Feb";
months[2]="Mar";
months[3]="Apr";
months[4]="May";
months[5]="Jun";
months[6]="Jul";
months[7]="Aug";
months[8]="Sep";
months[9]="Oct";
months[10]="Nov";
months[11]="Dec";

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
var getletter1 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter2 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter3 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter4 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter5 = letter1[Math.floor(Math.random()*letter1.length)]; 
var M_numb=getletter1+getletter2+getletter3+getletter4+getletter5; 

  function ajx(){ 
  try {
     xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
   } catch (e) {
try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
                  xmlhttp = false;}
}
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
} 
     refresh();
   }       

function write(){ 
focs.focus();  
setTimeout('scrolUp()',1000);

var copy=document.getElementById("messageCache").innerHTML;
var paste=document.getElementById("messages");
paste.innerHTML=copy;
var h=screen.height;
   
var hght=0.61*h*1;
var wdth=0.22*numb*1;
var MenuWdth=0.26*numb*1; 
var abtwdth=0.14*numb*1;
var units="mm";
var p="%";
var txtBwdth = 64.55477172900306 /100*wdth;
var txtBhgt = 3/100*wdth;

document.getElementById("txtArea").style.height=txtBhgt+units; 
document.getElementById("txtArea").style.width=txtBwdth+units; 

document.getElementById("data").style.width=wdth+units;

document.getElementById("abt").style.width=98.5+p;
document.getElementById("forward").style.width=wdth+units;
document.getElementById("shop").style.width=98.5+p;
document.getElementById("abtTxt").style.width=abtwdth+units;
document.getElementById("forwardTxt").style.width=abtwdth+units;
document.getElementById("hlpTxt").style.width=abtwdth+units;

document.getElementById("Help").style.width=98.5+p;
document.getElementById("MobiNav").style.width=98.5+p;   
document.getElementById("data").style.height=hght+"px";
document.getElementById("tab").style.width=numb+"mm";

if(wdth<132){
 var txtBhgt = 8.22/100*wdth;
 document.getElementById("txtArea").style.height=txtBhgt+units; 
} 
ajx();

if(numb>=1280)
{
document.getElementById("data").style.left=15+"%";

document.getElementById("data").style.width=63+"%";
document.getElementById("MobiNav").style.left=15+"%";
document.getElementById("MobiNav").style.width=63+"%";

document.getElementById("Help").style.left=15+"%";
document.getElementById("abt").style.left=15+"%";
document.getElementById("shop").style.left=15+"%";

document.getElementById("Help").style.width=63+"%";
document.getElementById("abt").style.width=63+"%";
document.getElementById("shop").style.width=63+"%";
}
}

function makeGetrequest1(serverPage, objID) {  

          var obj = document.getElementById(objID);

  xmlhttp.open("GET", serverPage,true); 

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
if(xmlhttp.responseText !=null || xmlhttp.responseText!=""){
 
obj.innerHTML = xmlhttp.responseText;
document.getElementById("action").innerHTML=typeFrm.typ.value;
if(onlineFrm.onlne.value!="*"){

document.getElementById("statement").innerHTML=seenFrm.see.value;
}
if(onlineFrm.onlne.value=="*"){

document.getElementById("statement").innerHTML=statementFrm.view.value;
}
document.getElementById("online").innerHTML=onlineFrm.onlne.value;

if(getMsgs.load.value!=""){
document.getElementById("focs").focus();  
setTimeout('scrolUp()',1000);  
getMsgs.load.value="";} 
if(F4.msgRecieved.value=="" & F5.msgCount.value !=""){

F4.msgRecieved.value=F5.msgCount.value;
}
if(F5.msgCount.value>F4.msgRecieved.value){ 
document.getElementById("focs").focus(); 
setTimeout('scrolUp()',1000);
F4.msgRecieved.value=F5.msgCount.value; 
}}
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

           }
}
    }
 xmlhttp.send(null); 

 }
   function makeGETrequest(serverPage,objID) {  
             var obj = document.getElementById(objID);

  xmlhttp.open("GET", serverPage,true);

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText !=null){ obj.innerHTML = xmlhttp.responseText; 
focs.focus();  
setTimeout('scrolUp()',1000);
setTimeout('ClearTick()',2000);  }
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){
 }
}
    }
 xmlhttp.send(null); 

 }
function sndMulrequest(serverPage) {  

          var obj = document.getElementById("Sent1");

  xmlhttp.open("GET", serverPage, true);

               xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText !=null){ 

 obj.innerHTML = xmlhttp.responseText;  }
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){
 }
}
    }
 xmlhttp.send(null); 

 }

function ClearTick(){
document.getElementById("sent").innerHTML="";
document.getElementById("sent1").innerHTML="";
}   
function refresh(){ 
                      
setInterval('info()',1000);  
}

function info(){  
var d = new Date();
var hr = d.getHours();
var min = d.getMinutes();
var sec = d.getSeconds();
var tme = hr+":"+min+":"+sec; 
var dy=d.getDate();
var mnth=d.getMonth();
var year=d.getFullYear();
var s="/";

var stamp = "seen "+dy+s+months[mnth]+s+year+", "+hr+":"+min;


 
var sender = F1.sender.value;

var typing=F9.type.value;
var lodPg=F8.loadPg.value; 
var prms="?sender="+sender+"&time="+tme+"&seen="+stamp+"&type="+typing;
                   
var page=lodPg+prms;
var ID="messages";          
makeGetrequest1(page, ID); 
var msgTxt=document.getElementById("txtArea").value;
if(msgTxt==""){ document.getElementById("type").value="";
} 

}

function menu(){ clk+=1; 

end(); // prevents menu from hiding after sending message

var navigate =  document.getElementById("mnu"); 
var txtArea = document.getElementById("msgBody");

if(clk==1){
navigate.style.display="block"; 
}

if(clk==2){
navigate.style.display="none"; clk=0; 
}
}

function whichButton(e){ end();
var button;

if(!e){e = window.event; 
}

if(e.which){
button = e.which;

}
  if(e.button){
button = e.button;

}
 changeBack(button);
}

function changeBack(x){
LeftClkcount++;

 if(x=="1" || x=="0"){
if(LeftClkcount=="0"){

document.getElementById("mnu").style.display="block"; // show
document.getElementById("abt").style.display="none"; //if open
document.getElementById("Help").style.display="none";
document.getElementById("shop").style.display="none";
document.getElementById("mobiTxtB").style.display="none";
}

if(LeftClkcount=="1"){

 document.getElementById("mnu").style.display="none"; // hide

LeftClkcount=-1; 
 }

}
 
else{
}
}

function hideAbtTxt(){
document.getElementById("abt").style.display="none";

 }

function hideHelpTxt(){
document.getElementById("Help").style.display="none";

 }
function hideShopTxt(){
document.getElementById("shop").style.display="none";

 }
function hideBlock(){
var navigate = document.getElementById("mnu");
document.getElementById("mobiTxtB").style.display="none";
navigate.style.display = "none";

 }

function about(){
var navigate =  document.getElementById("mnu");
var abtArea = document.getElementById("abt");

navigate.style.display="none";
abtArea.style.display="block";
document.getElementById("menu").onclick=hideAbtTxt;

        }
function forward(){
var d = new Date();
var hr = d.getHours();
var min = d.getMinutes();
var sec = d.getSeconds();
var tme = hr+":"+min+":"+sec;
var page="forward.php?time="+tme+"&from="+F1.sender.value;
  parent.window.location.href=page;

}

function reply(){ rlpyLink++; 

if(numb<1280){ //mobile 
document.getElementById("mobiTxtB").style.display="block";
}
if(numb>=1280){ //desktop
var txtArea = document.getElementById("txtArea");   
txtArea.value = "";
txtArea.focus();
}
var navigate =  document.getElementById("mnu");
var txtArea = document.getElementById("rplyVal");    
navigate.style.display="none";

if(rlpyLink==1){ 

txtArea.value=" Type message, (Enter = Send: Google Chrome)";
}

txtArea.onclick=clearRplyVal;

  document.getElementById("menu").onclick=hideBlock;


}
function Quickreply() {

if(numb<1280){ //mobile
document.getElementById("mobiTxtB").style.display="block";
}
   
    var txtArea = document.getElementById("rplyVal");   
    txtArea.value = "";
    txtArea.focus();

    document.getElementById("menu").onclick = hideBlock;

}

function clearRplyVal(){ clicM++;

if(clicM==1){
document.getElementById("rplyVal").value="";
}
}
  
function help(){

var navigate =  document.getElementById("mnu");
var hlpArea = document.getElementById("Help");

navigate.style.display="none";
hlpArea.style.display="block";

document.getElementById("menu").onclick=hideHelpTxt;

}
function shop(){
      
var navigate =  document.getElementById("mnu");
var shopArea = document.getElementById("shop");

navigate.style.display="none";
shopArea.style.display="block";

document.getElementById("menu").onclick=hideShopTxt;
 }

function backPage(){
   
history.back();
}

function scrolUp(){
var msgBx = document.getElementById("txtArea");
msgBx.focus(); 
msgBx.display="none"; 

if(numb<1280){ // hide keypad for a mobile

setTimeout('hideKeyPad()',2500);
}
}

function hideKeyPad(){ 
document.getElementById("txtArea").blur();
}

function fastSnd(){  var k;

if(event.keyCode){ k = event.keyCode; if(k!=""){document.getElementById("type").value="typing";}
}

else if(event.which){ k = event.which; if(k!=""){document.getElementById("type").value="typing";}
 
}  
if(k==13){ postMsg(); 
 
}
} 
var resendVal;

var msStore="";

var M_numb="";

function postMs(){ 
       
var sender = F1.sender.value;

var prms = "?msg="+msStore+"&to="+sender+"&M_numb="+M_numb;       
      var Page="m.send.php"+prms;
var ID="sent";  
        
makeGetrequest1(Page, ID)

document.getElementById("TpMsg").innerHTML=msStore;
document.getElementById("Resend").innerHTML="<button id='resendBtn'>resend</button>";
document.getElementById("resendBtn").onclick=resend;

hideBlock();

}

function postMsg(){ 

var getletter1 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter2 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter3 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter4 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter5 = letter1[Math.floor(Math.random()*letter1.length)];
 
M_numb=getletter1+getletter2+getletter3+getletter4+getletter5;

var msgVal=document.getElementById("txtArea").value; 
resendVal=msgVal;  

msStore=msgVal;
document.getElementById("txtArea").value=""; 

timeout=setInterval('postMs()',1500); control=timeout;

setTimeout('end()',9000);

}

function end(){ 
if(control>0){
clearInterval(timeout); 
}
}

function resend(){
document.getElementById("txtArea").value=resendVal; 
postMsg();
}

function Doreply(){
document.getElementById("txtArea").value=replyVal;  
postMsg();
}

var replyVal;
function fastRply(){
var k;
var msg=document.getElementById("rplyVal").value; 
replyVal=msg; 
document.getElementById("replyBtn").onclick=Doreply;


if(event.keyCode){ k = event.keyCode; if(k!=""){document.getElementById("type").value="typing";}

}
else if(event.which){ k = event.which; if(k!=""){document.getElementById("type").value="typing";}

}  
if(k==13){ 
document.getElementById("txtArea").value=msg;  
postMsg();

}
}
function loadMore(){
F8.loadPg.value="m.chatData1.php";
document.getElementById("loading").style.display="block"; 
}

function loadMore1(){
F8.loadPg.value="m.chatData2.php"; 
document.getElementById("loading").style.display="block";
}

function loadMore2(){
F8.loadPg.value="m.chatData3.php";
document.getElementById("loading").style.display="block"; 
}

function loadMore3(){
F8.loadPg.value="m.chatData4.php";
document.getElementById("loading").style.display="block"; 
}