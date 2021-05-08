<?php
session_start();
unset($_SESSION['receptionist']);

header("Location:login.php");
?>