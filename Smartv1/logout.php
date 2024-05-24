<?php include("includes/conn.php"); ?>

<?php
 session_start(); 
 unset($_SESSION['username']); 
 header("location: index.php");




?>
