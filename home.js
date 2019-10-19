window.onload=write;    
var numb=screen.width;
var clk=0; 
var clic=0;
var LeftClkcount=-1; 
var xmlhttp = false; 
nocache = ""+Math.random()*1000000; 
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
     refresh();
   }   
        
var cachedAdB=document.getElementById("adsCacheB").innerHTML;
function write(){      
var h=screen.height;
var cachedAd=document.getElementById("adsCache").innerHTML;
document.getElementById("adsContents").innerHTML=cachedAd;

var hght=0.61*h*1;
var wdth=0.22*numb*1;
var abtwdth=0.14*numb*1;
var units="mm";
var p="%"; 
 
var txtBwdth = 96.55477172900306 /100*wdth;
var txtBhgt = 3/100*wdth;
var txtBhgt1 = 7/100*wdth;

document.getElementById("msgBody").style.width=txtBwdth+units;  
document.getElementById("msgBody").style.height=txtBhgt1+units;  

 
document.getElementById("sendMulBody").style.width=txtBwdth+units;
document.getElementById("sendMulBody").style.height=txtBhgt+units;
document.getElementById("searchVal").style.width=txtBwdth+units;    
document.getElementById("searchVal").style.height=txtBhgt+units;
document.getElementById("go").style.width=txtBwdth+units;
  
document.getElementById("data").style.width=wdth+units;  
document.getElementById("to").style.width=txtBwdth+units;
document.getElementById("snd").style.width=txtBwdth+units;
document.getElementById("to").style.height=txtBhgt+units;
 
document.getElementById("upDteTxtBx").style.width=txtBwdth+units;
document.getElementById("updteBtn").style.width=txtBwdth+units;
document.getElementById("HideBtn").style.width=txtBwdth+units;
document.getElementById("upDteTxtBx").style.height=txtBhgt+units;

document.getElementById("abt").style.width=wdth+units;
document.getElementById("shop").style.width=wdth+units;
document.getElementById("DeleteIt").style.width=wdth+units;
document.getElementById("abtTxt").style.width=abtwdth+units;

document.getElementById("mnu").style.width=wdth+units;
document.getElementById("MobileNav").style.width=97.5+p; 
document.getElementById("sendNew").style.width=97.5+p;
document.getElementById("sendMul").style.width=97.5+p;
document.getElementById("search").style.width=97.5+p;
document.getElementById("update").style.width=97.5+p; 
document.getElementById("data").style.height=hght+"px";
document.getElementById("tab").style.width=numb+"mm";

if(wdth<132){
 var txtBhgt = 8.22/100*wdth;
 var txtBhgt1 = 8.22/100*wdth;
 document.getElementById("to").style.height=txtBhgt+units;
 document.getElementById("upDteTxtBx").style.height=txtBhgt+units;
 document.getElementById("searchVal").style.height=txtBhgt+units;
 document.getElementById("msgBody").style.height=txtBhgt1+units;
 document.getElementById("sendMulBody").style.height=txtBhgt1+units; } 

if(numb>=1280)
{ 
document.getElementById("first").style.width=30+"%";  
document.getElementById("data").style.left=15+"%";
document.getElementById("MobileNav").style.left=15+"%";
document.getElementById("MobileNav").style.width=60+"%";

document.getElementById("sendNew").style.left=15+"%";
document.getElementById("sendMul").style.left=15+"%";
document.getElementById("search").style.left=15+"%"; 
document.getElementById("update").style.left=15+"%";
document.getElementById("abt").style.left=15+"%";
document.getElementById("shop").style.left=15+"%";

document.getElementById("sendNew").style.width=60+"%";
document.getElementById("sendMul").style.width=60+"%";
document.getElementById("search").style.width=60+"%";
document.getElementById("update").style.width=60+"%";
document.getElementById("abt").style.width=60+"%";
document.getElementById("shop").style.width=60+"%";
//search
document.getElementById("go").style.width=50+"%";
document.getElementById("searchVal").style.width=50+"%";
//update
document.getElementById("upDteTxtBx").style.width=50+"%";
document.getElementById("updteBtn").style.width=50+"%";
document.getElementById("HideBtn").style.width=50+"%";
//compose
document.getElementById("to").style.width=50+"%";
document.getElementById("msgBody").style.width=50+"%";
document.getElementById("snd").style.width=50+"%";
}

ajx();  
}

function makeGetrequest1(serverPage, objID) {  

var obj = document.getElementById(objID);

  xmlhttp.open("GET", serverPage,nocache,true);

        xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 

if(xmlhttp.responseText !=null || xmlhttp.responseText!=""){
 
obj.innerHTML = xmlhttp.responseText;
document.getElementById("inbox").innerHTML=inboxFrm.ib.value;
var cachedAd=document.getElementById("adsCache").innerHTML;
var cachedAd=document.getElementById("adsContents").innerHTML=cachedAd; 
}
 
   if(xmlhttp.responseText=="" || xmlhttp.responseText==null){

           }
}
    }
 xmlhttp.send(null); 

 }
   
function refresh(){  
setInterval('info()',2000);  
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
var page="m.convData1.php?time="+tme+"&seen="+stamp;
var ID="data";          
makeGetrequest1(page, ID);
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
function sndMulrequest(serverPage) {  

          var obj = document.getElementById("sent");

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
function printData(){
document.getElementById("data").style.display="table-cell";
}
function hideData(){
document.getElementById("data").style.display="none";
}

function menu(){ 
clk+=1;
var navigate =  document.getElementById("mnu"); 
var txtArea = document.getElementById("msgBody");

if(clk==1){
    navigate.style.display="block"; hideData()
 }

 if(clk==2){
    navigate.style.display="none"; printData()
clk=0; 
}
         
 }

function whichButton(e){ 
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
hideData();

 document.getElementById("sendNew").style.display="none"; // if open hide
 document.getElementById("search").style.display="none"; 
 document.getElementById("update").style.display="none";  
 document.getElementById("abt").style.display="none";  
 document.getElementById("shop").style.display="none";
 document.getElementById("mobiTxtB").style.display="none";
}

if(LeftClkcount=="1"){

 document.getElementById("mnu").style.display="none"; // hide 
printData();

LeftClkcount=-1; 
 }

}
 
else{
}
}

function empty(){
         document.getElementById("to").value="";
}

function emptyMobiTo(){
         document.getElementById("mobiTo").value="";
}

function empty1(){
         document.getElementById("upDteTxtBx").value="";
         document.getElementById("upDteTxtBx").style.color="#000055";
}

function emptymsgBody(){ 
var txtArea = document.getElementById("msgBody");
         txtArea.value="";
 txtArea.style.color="#000055";
 
}

function emptysearchVal(){ 
var txtArea = document.getElementById("searchVal");
txtArea.value="";
txtArea.style.color="#000055";
 
}

function emptysendMulVal(){ 
var txtArea = document.getElementById("sendMulBody");
txtArea.value="";
txtArea.style.color="#000055";
 
}

function serchC(f){ 
var val = srch.searchVal.value;
var rsults=document.getElementById("sData");         
var schTxtB=document.getElementById("srch");
var page="srchConversation.php?name="+val; 
var ID="sData";

if(srch.searchVal.value!=""){  
makeGetrequest(page, ID); 
} 
}

function SerchBtn(){ 
var val = srch.searchVal.value; 
parent.window.location.href="srchConversation.php?name="+val; 
}

function compose(){ 
var navigate =  document.getElementById("mnu");
var txtArea = document.getElementById("msgBody");   
var txtArea1 = document.getElementById("mobiMsgB");  
navigate.style.display="none";
hideData();

document.getElementById("mobiTo").value="Txt number";
document.getElementById("to").value="Txt number";

//desktop
if(numb>=1280)
{ 
document.getElementById("sendNew").style.display="block";
txtArea.value=" type message";
document.getElementById("menu").onclick=hideBlock;
}

//mobile
if(numb<1280)
{ 
document.getElementById("sendNew").style.display="none";
txtArea1.value=" type message";
txtArea1.onclick=clearM;
document.getElementById("mobiTxtB").style.display="block";
}
}

function clearM(){ 
document.getElementById("mobiMsgB").value="";
}

function SndMul(){ 

makeGetrequest("m.SendMultple.php", "ChckBx");
var navigate =  document.getElementById("mnu");
var txtArea = document.getElementById("sendMulBody");    
   
navigate.style.display="none";
document.getElementById("sendMul").style.display="block";
txtArea.value=" type message";
document.getElementById("menu").onclick=hideBlock;

 }
function reqHelp(){makeGetrequest("m.help.php", "abtTxt");}

function shareSms(){
var sms=" Sign up and chat with me or other users. Go to http://www.txtapplication.net/mobi";
window.location.href="sms:?body="+sms;
}
 
var mnumB="";
var msStore="";
var toWho="";

function Comps(){

var prms = "?msg="+msStore+"&to="+toWho+"&M_numb="+mnumB;       
var Page="m.send.php"+prms;
var ID="sentB";
makeGetrequest(Page,ID); 
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

function mobiCompse(){
var msgVal=document.getElementById("mobiMsgB").value;
var To=document.getElementById("mobiTo").value; 
var getletter1 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter2 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter3 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter4 = letter1[Math.floor(Math.random()*letter1.length)];
var getletter5 = letter1[Math.floor(Math.random()*letter1.length)]; 
var m_numb=getletter1+getletter2+getletter3+getletter4+getletter5;

mnumB=m_numb;
msStore=msgVal;
toWho=To; 

if(To==""){ 
alert('Enter receiver`s Txt number'); 
}

var flag=0;

if(To>0){ flag++;

}

if(flag==0 && To!=""){ 
alert('Invalid Entry'); return true;
}

if(To!=""){ 
var state=document.getElementById("statement");

setInterval('Comps()',1500); 
state.innerHTML="<h4>sending..</h4>";
state.style.color="green";
setTimeout('wait()',5000); 
}

}

function wait(){ openChat(toWho);

}

function openChat(x){ 
parent.window.location='m.chat.php?oponent='+x;

}

function ClearTick(){document.getElementById("sentB").innerHTML="";}

function serch(){ 
var navigate =  document.getElementById("mnu");
var txtArea = document.getElementById("searchVal");    
   
navigate.style.display="none";
document.getElementById("search").style.display="block";
txtArea.value="For conversations & people";
document.getElementById("menu").onclick=hideBlock;

 }

function accUpdate(){  
var navigate =  document.getElementById("mnu");
var updatescreen =  document.getElementById("update");
   
var txtB = document.getElementById("upDteTxtBx");       
var hideBtn = document.getElementById("HideBtn");  

navigate.style.display="none";
updatescreen.style.display="block";  
txtB.value="Enter New value"; 
txtB.onclick=empty1;  
  
hideBtn.style.display="none";

document.getElementById("menu").onclick=hideUpdateblck;
}

function hideUpdateblck(){
document.getElementById("update").style.display="none";

 }

function hideBlock(){
document.getElementById("sendNew").style.display="none"; 
document.getElementById("search").style.display="none";
document.getElementById("sendMul").style.display="none";

}

function hideAbtTxt(){
document.getElementById("abt").style.display="none";

}
function hideShopTxt(){
document.getElementById("shop").style.display="none";

}

function about(){
var navigate =  document.getElementById("mnu");
var abtArea = document.getElementById("abt");
navigate.style.display="none";
abtArea.style.display="block";
document.getElementById("menu").onclick=hideAbtTxt;
}

function shop(){
var navigate =  document.getElementById("mnu");
var shopArea = document.getElementById("shop");
navigate.style.display="none";
shopArea.style.display="block";   

document.getElementById("menu").onclick=hideShopTxt;
} 

function ChangeBtn(f){ 
clic+=1; 
     
var hideBtn = document.getElementById("HideBtn");      
var txtB = document.getElementById("upDteTxtBx");

if(clic==1){
hideBtn.value="show";    
txtB.type="password"
} 

if(clic==2){
hideBtn.value="hide";    
txtB.type="text"
clic=0; 
}
}

function Updating(radio){
switch(radio){
case "option1": updte.option1.checked="true"; HideButn();
 break;
case "option2": updte.option2.checked="true"; HideButn();
 break;
case "option3": updte.option3.checked="true"; HideButn();
 break;
case "option4": updte.option4.checked="true"; BtnVisible();
 break;
case "option5": updte.option5.checked="true"; HideButn();
 break;
}
}

function BtnVisible(){ 
var hideBtn = document.getElementById("HideBtn"); 
hideBtn.style.display="block"; 
}

function HideButn(){ 
var hideBtn = document.getElementById("HideBtn"); 
hideBtn.style.display="none"; 
}

function Delte(a){ 
var page="m.delete.php?delete="+a; 
var ID="del";

if(confirm("Confirm delete?")==true){
makeGetrequest(page, ID);
} 
else{
}
}
function DelteAll(){ var page="m.deleteAll.php"; 
var ID="delete";
makeGetrequest(page, ID); 
 } 
function openChatPg(a){
parent.window.location='m.chat.php?oponent='+a; 
}