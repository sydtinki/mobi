<html>
<head><title>Redirecting</title>
<?php
$cookie_name = "userID";
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); 

if(!isset($_COOKIE[$cookie_name])) {
 setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); 
} else { forceIt();
    echo "<form name='Go'><input type='hidden' id='loG' value=''></form>";
}
function forceIt(){
 setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/");}
?>
<script>
window.onload=load;

function load(){ 
setInterval('check()',1000);}
function check(){
if(Go.loG.value==""){ parent.window.location.href="index.php";}
}
</script>
</head>
<body><center>
 wait..</center>
</body>
</html>
