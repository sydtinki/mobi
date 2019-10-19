<?php
require_once 'log_in.php';
$cookie_name = "userID";
$me=$_COOKIE[$cookie_name];
 
$select="select numb, name, sname from member JOIN messages ON member.numb=messages.sender where receiver=$me GROUP BY sender order by name Asc;";
 $result = mysql_query($select); if(!$result) die(); 
 $rows = mysql_num_rows($result);
 echo "<a href='javascript:selctAll()'> Select All</a>";

  for($i=0; $i<$rows; ++$i){ 

           $row = mysql_fetch_row($result); 
           echo "<p><input type='checkbox' id='place' value='$row[0]'>".$row[1]." ".$row[2]."<br />";
            }

?>

