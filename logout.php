<?php

session_start();
unset($_SESSION['email']);
header("location:sda login.php");

?>