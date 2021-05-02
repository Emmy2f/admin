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
        <?php include_once 'commonMethods.php';
 doDBConnect();
        ?>
    </head>
    <body>
        <?php 
        $err_dname=$err_sname="";
        ?>
        <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h4 class="page-title">Add Staff to Department</h4>
                        </div>
                    </div>
                    <form method="post">
                    <div class="row">
        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Department Name </label>
                                            <select class="form-control" name="txtdname">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from departmentMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['deptId'];
                                                        echo "<option value=$id>" . $row['deptName'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if ($_POST['txtdname'] == "select") {
                                                        $err_dname = "Department name is required";
                                                    } else {
                                                        $err_dname = "";
                                                    }
                                                }
                                                echo $err_dname;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Staff Name </label>
                                            <select class="form-control" name="txtsname">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from staffMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['staffID'];
                                                        echo "<option value=$id>" . $row['staffID']." " . $row['staffFName'] ." ". $row['staffLName'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if ($_POST['txtsname'] == "select") {
                                                        $err_sname = "Staff name is required";
                                                    } else {
                                                        $err_sname = "";
                                                    }
                                                }
                                                echo $err_sname;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <br>
                                           <input name="btnsub" type="submit" value="Add" class="btn btn-primary submit-btn">
                                        
                                    </div>
                    
                    
                        
                    </div>
                        </form>
                    <?php
                            if(isset($_POST['btnsub']))
                            {
                                if($err_dname=="" && $err_sname=="")
                                {
                                     $did = $_POST['txtdname'];
                                     $sid=$_POST['txtsname'];
             
              global $con;
              $qry = $con->query("insert into tbl_dept_staff(deptId,staffID) values('$did','$sid')");
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
