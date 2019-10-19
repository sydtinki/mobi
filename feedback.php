<?php
require_once 'log_in.php';
if(isset($_GET['msg']))

$message=$_GET['msg'];
$subject="Txt Application - Feedback";
$to="txtapplication@gmail.com";
mail($to,$subject,$message);
echo "Thank you for your time";

?>