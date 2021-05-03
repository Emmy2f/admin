<?php session_start() ;
    if(!isset($_SESSION['admin']))
    {
        header("Location:login.php");
    }
?><!DOCTYPE html>
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
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        doDBConnect();
        
        ?>
        <script>
            function showroom()
            {
                document.getElementById('room').styles.display="block";
            }
            </script>
    </head>
    <body><?php
        
        $err_bnum = $err_floor=$err_room="";
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Bed</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="form-group">
                                <label>Bed Number</label>
                                <input class="form-control" type="text" name="txtbnum">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtbnum']))
                                                    {
                                                        $err_bnum="Bed number is required";
                                                    }
                                                    else if ((!preg_match("/[0-9][0-9][0-9]/", $_POST['txtbnum']))) {
                                                        $err_bnum = "Invalid Bed number";
                                                    } else {
                                                        $err_bnum = "";
                                                    }
                                                }
                                                echo $err_bnum;
                                                ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Select Floor</label>
                                <select class="form-control" name="txtfloor" onchange="showroom()">
                                    <option value="select">--Select--</option>
                                    <option value="Ground">Ground</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if($_POST['txtfloor']=="select")
                                                    {
                                                        $err_floor="Floor is required";
                                                    }
                                                   else {
                                                        $err_floor = "";
                                                    }
                                                }
                                                echo $err_floor;
                                                ?>
                                </span>
                            </div>
                            <div class="form-group" style="display:none" id='room'>
                                <label>Select Room</label>
                                <select class="form-control" name="txtroom"  >
                                    <option value="select">--Select--</option>
                                    <?php
                                    $fetch = $con->query("select * from roomMaster where floor=$_POST[txtfloor]");
                                    if ($fetch) {

                                        while ($row = $fetch->fetch_assoc()) {
                                            $id = $row['roomNumber'];
                                            echo "<option value=$id>" . $row['roomNumber'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if($_POST['txtroom']=="select")
                                                    {
                                                        $err_room="Room is required";
                                                    }
                                                   else {
                                                        $err_room = "";
                                                    }
                                                }
                                                echo $err_room;
                                                ?>
                                </span>
                            </div>
                         
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="btnaddroom">Add Bed</button>
                            </div>
                        </form>
                        <?php
//                        if (isset($_POST['btnaddroom']) ) {
//                            if($err_rnum=="" && $err_floor=="" && $err_type=="" && $err_beds=="" && $err_cost=="" && $err_description=="")
//                            {
//                            $roomnum = $_POST['txtrnum'];
//                            $floor = $_POST['txtfloor'];
//                            $rtype = $_POST['txttype'];
//                            $beds = $_POST['txtbeds'];
//                            $cost = $_POST['txtcost'];
//                            $desc=$_POST['txtdesc'];
//
//                            $qry = $con->query("insert into roomMaster(roomNumber,floor,roomTypeId,numberOfBeds,costPerDay,description)"
//                                    . "values('$roomnum','$floor','$rtype','$beds','$cost','$desc')");
//                                    
//                            //echo "<script>alert('$qry')</script>";
//
//                            if ($qry == true) {
//                                echo "<script>alert('Data Inserted')</script>";
//                            } else {
//                                echo "<script>alert('Data Not Inserted')</script>";
//                            }
//                            }
//                            else
//                            {
//                                echo "<script>alert('Form is not filled correctly')</script>";
//                            }
//                        }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>
