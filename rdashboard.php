<?php session_start() ;
    if(!isset($_SESSION['receptionist']))
    {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'styles.php'; ?>
        <?php include 'rheader.php'; ?>
        <?php include 'rsidebar.php'; ?>
        <?php        include_once 'commonMethods.php';
        doDBConnect();
        ?>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
