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
    </head>
    <body><?php
        
        $err_rnum = $err_floor=$err_type=$err_beds=$err_cost=$err_description="";
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Room</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" type="text" name="txtrnum">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtrnum']))
                                                    {
                                                        $err_rnum="Room number is required";
                                                    }
                                                    else if ((!preg_match("/[0-9][0-9][0-9]/", $_POST['txtrnum']))) {
                                                        $err_rnum = "Invalid Room number";
                                                    } else {
                                                        $err_rnum = "";
                                                    }
                                                }
                                                echo $err_rnum;
                                                ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Floor</label>
                                <select class="form-control" name="txtfloor">
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
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" name="txttype">
                                    <option value="select">--Select--</option>
                                    <?php
                                    $fetch = $con->query("select * from roomType");
                                    if ($fetch) {

                                        while ($row = $fetch->fetch_assoc()) {
                                            $id = $row['roomTypeId'];
                                            echo "<option value=$id>" . $row['roomType'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if($_POST['txttype']=="select")
                                                    {
                                                        $err_type="Room Type is required";
                                                    }
                                                   else {
                                                        $err_type = "";
                                                    }
                                                }
                                                echo $err_type;
                                                ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Number of Beds</label>
                                <input class="form-control" type="text" name="txtbeds">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtbeds']))
                                                    {
                                                        $err_beds="Number of Beds is required";
                                                    }
                                                    else if ((!preg_match("/[0-9][0-9]/", $_POST['txtbeds']))) {
                                                        $err_beds = "Invalid Beds number";
                                                        
                                                    } 
                                                    else if($_POST['txtbeds']>12 ||$_POST['txtbeds']<0)
                                                    {
                                                        $err_beds="Beds should be less than 12 and greater than 0";
                                                    }
                                                    else {
                                                        $err_beds = "";
                                                    }
                                                    
                                                    echo $err_beds;
                                                }
                                                
                                                ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Cost Per Day</label>
                                <input class="form-control" type="text" name="txtcost">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtcost']))
                                                    {
                                                        $err_cost="Cost is required";
                                                    }
                                                    else if ((!preg_match("/[0-9]+/", $_POST['txtcost']))) {
                                                        $err_cost = "Invalid Cost";
                                                    } 
                                                    else if($_POST['txtcost']>100000 ||$_POST['txtcost']<0)
                                                    {
                                                        $err_cost="Cost should be between 0 to 100000";
                                                    }else {
                                                        $err_cost = "";
                                                    }
                                                    
                                                    echo $err_cost;
                                                }
                                                
                                                ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" cols="30" name="txtdesc"></textarea>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtdesc']))
                                                    {
                                                        $err_description="Description is required";
                                                    }
                                                    else if ((!preg_match("/[A-Za-z ]+/", $_POST['txtdesc']))) {
                                                        $err_description = "Invalid Description";
                                                    } else {
                                                        $err_description = "";
                                                    }
                                                    echo $err_description;
                                                }
                                                
                                                ?>
                                </span>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="btnaddroom">Add Room</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['btnaddroom']) ) {
                            if($err_rnum=="" && $err_floor=="" && $err_type=="" && $err_beds=="" && $err_cost=="" && $err_description=="")
                            {
                            $roomnum = $_POST['txtrnum'];
                            $floor = $_POST['txtfloor'];
                            $rtype = $_POST['txttype'];
                            $beds = $_POST['txtbeds'];
                            $cost = $_POST['txtcost'];
                            $desc=$_POST['txtdesc'];

                            $qry = $con->query("insert into roomMaster(roomNumber,floor,roomTypeId,numberOfBeds,costPerDay,description)"
                                    . "values('$roomnum','$floor','$rtype','$beds','$cost','$desc')");
                                    
                            //echo "<script>alert('$qry')</script>";

                            if ($qry == true) {
                                echo "<script>alert('Data Inserted')</script>";
                            } else {
                                echo "<script>alert('Data Not Inserted')</script>";
                            }
                            }
                            else
                            {
                                echo "<script>alert('Form is not filled correctly')</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>
