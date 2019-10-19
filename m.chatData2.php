<?php 
require_once 'log_in.php'; 
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
if(isset($_GET['sender'])&&
isset($_GET['time'])&&
isset($_GET['seen'])&&
isset($_GET['type'])&&
isset($_GET['message'])&&
isset($_GET['mnum']))

$tme=$_GET['time'];
$seen=$_GET['seen'];
$sender=$_GET['sender'];
$type=$_GET['type'];
$message=$_GET['message'];
$message = mysql_real_escape_string($message);
$mnun=$_GET['mnum'];

$name=names($sender);
$update="update messages set status='read' where receiver=$me and sender=$sender";
$select="select sender, message, stamp from messages where receiver=$me AND sender= $sender OR receiver= $sender AND sender=$me order by stamp ASC";

$result = mysql_query($select); 
$rows = mysql_num_rows($result);
$idx=-1;
$beginAt=$rows-42;
$snder = array();
$msg=array();
$stmp=array();
$tme=time(); 
$time_chck=$tme+5;
$addme="insert into status values($tme,$me,$time_chck)";
$clear="delete from status where tme<$tme";
$cancel="delete from action where tme<$tme";
$added = mysql_query($addme);
$track="update member set seen='$seen' where numb=$me";
$seen = mysql_query($track);
$statement=statement($sender);
$ceen=seen($sender);
$cleared = mysql_query($clear);
$canceled = mysql_query($cancel);
$olne=active_user($sender);
$keyDwn=userRply($me,$sender);
echo "<form name='onlineFrm'><input type='hidden' id='onlne' value='$olne'></form>";
echo "<form name='typeFrm'><input type='hidden' id='typ' value='$keyDwn'></form>";
echo "<form name='seenFrm'><input type='hidden' id='see' value='$ceen'></form>";
echo "<form name='statementFrm'><input type='hidden' id='view' value='$statement'></form>";
echo "<form name='F5'><input type='hidden' name='Counter' id='msgCount' value='$rows1'></form>"; 

if($type!=""){$typer="insert into action values($tme,$me,$sender,$time_chck)";
mysql_query($typer);
}
if($type==""){$Xtyper="delete from action where receiver=$me";
mysql_query($Xtyper);
}

if($rows>=43){ echo "<span id='LoadAll'>[ <a href='javascript:loadMore2()'>Load Earlier Messages </a>]</span><p><b id='loading'>loading..</b><p>"; for($i=0; $i<$rows; $i++){ $idx++; 
        $row = mysql_fetch_row($result);        
         
      $snder[$idx]=$row[0];
      $msg[$idx]="$row[1]";
      $stmp[$idx]="$row[2]";
       }

for($i=$beginAt; $i<$rows; ++$i){ 

$color=colorful(names($snder[$i]),$name);
$date=colorfulB(names($snder[$i]),$name);

    echo "<span id='$color'><b>".names($snder[$i])."</b><br>-- $msg[$i]</span><br><span id=$date>".$stmp[$i]."</span><p>"; 
         } echo "<p><span id='white'>||||</span><p>"; }

if($rows<=42){  for($i=0; $i<$rows; $i++){  
$row = mysql_fetch_row($result); 
       
$color=colorful(names($row[0]),$name);
$date=colorfulB(names($row[0]),$name);

    echo "<span id='$color'><b>".names($row[0])."</b><br>-- $row[1]</span><br><span id=$date>".$row[2]."</span><p>"; 
         } echo "<p><span id='white'>||||</span><p>";
           }  
       queryMysql($update);
 
 function names($x){  $select="select name, sname from member where numb=$x";
                        $result = mysql_query($select); 
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
 function seen($x){  $select="select seen from member where numb=$x";
                        $result = mysql_query($select); 
                        $rows = mysql_num_rows($result);
    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
             return $row[0];           }
 }
 function colorful($x,$y){ 
   $color1="incoming";
   $color2="outgoing";

     if($x!=$y){
   return $color2;         }
     else { return $color1;  }
 }
 function colorfulB($x,$y){ 
   $color1="date";
   $color2="date1";

     if($x!=$y){
   return $color2;         }
     else { return $color1;  }
 }
 function active_user($x){     
  $count="select count(tme) from status where oponent=$x"; 
  $result = mysql_query($count);  
  $rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "*"; }
      if($row[0]==0){
        return " "; } }  
     }
 function userRply($x,$y){     
  $count="select count(tme) from action where receiver=$y AND oponent=$x"; 
  $result = mysql_query($count);  
  $rows = mysql_num_rows($result);

    for($i=0; $i<$rows; ++$i){  
        $row = mysql_fetch_row($result); 
          if($row[0]!=0){
        return "typing.."; }
      if($row[0]==0){
        return " "; } }  
     }
  function queryMysql($query){

   $result = mysql_query($query); 
   return $result; }
?>