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
    <body>
        <?php
        
        $err_dname=$err_head=$err_contact=$err_description="";
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Department</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" name="txtdname">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtdname']))
                                                    {
                                                        $err_dname="Department is required";
                                                    }
                                                    else if ((!preg_match("/[A-Za-z ]+/", $_POST['txtdname']))) {
                                                        $err_dname = "Invalid Department Name";
                                                    } else {
                                                        $err_dname = "";
                                                    }
                                                }
                                                echo $err_dname;
                                                ?>
                                </span>
                            </div>
                            
                           
                            <div class="form-group">
                                <label>Department Head</label>
                                <select class="form-control" name="txthead">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from doctorMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['doctorId'];
                                                        echo "<option value=$id>" . $row['firstName'] . " ".$row['lastName']. "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if($_POST['txthead']=="select")
                                                    {
                                                        $err_head="Department Head is required";
                                                    }
                                                   else {
                                                        $err_head = "";
                                                    }
                                                }
                                                echo $err_head;
                                                ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input class="form-control" type="text" name="txtcontact">
                                <span style="color:red">
                                      <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtcontact'])) {
                                                        $err_contact = "Contact Number  is required";
                                                    } else if ((!preg_match("/^[0-9]{10}+$/", $_POST['txtcontact']))) {
                                                        $err_contact = "Contact Number must be of 10 digits";
                                                    } else {
                                                        $err_contact = '';
                                                    }
                                                }
                                                echo $err_contact;
                                                ?>
                                              
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="txtdesc"></textarea>
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
                                <button class="btn btn-primary submit-btn" name="btnsub">Add Department</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['btnsub']) ) {
                            if($err_dname=="" && $err_head=="" && $err_contact=="" && $err_description=="" )
                            {
                            $dname=$_POST['txtdname'];
                            $head=$_POST['txthead'];
                            $contact=$_POST['txtcontact'];
                            $desc=$_POST['txtdesc'];

                            $qry = $con->query("insert into departmentMaster(deptName,deptHead,deptContact,deptDesc)"
                                    . "values('$dname','$head','$contact','$desc')");
                                    
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
