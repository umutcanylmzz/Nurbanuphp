<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
$geldigi_sayfa = $_SERVER['HTTP_REFERER']; 
header("Refresh: 0; url=".$geldigi_sayfa."");
exit;
?>