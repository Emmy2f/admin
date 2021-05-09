<?php session_start() ;
    if(!isset($_SESSION['receptionist']))
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
        <?php include 'rheader.php'; ?>
        <?php include 'rsidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        doDBConnect();
        ?>

    </head>
    <body>
        <?php 
            $err_fname=$err_mname=$err_lname=$err_contact=$err_email=$err_gender=$err_address=$err_dob=$err_doj=$err_marital=$err_pass="";
        ?>
        <div class="main-wrapper">


            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h4 class="page-title">Register Patient</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="txtfname" id="fname" class="form-control" type="text">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtfname'])) {
                                                        $err_fname = "First Name is required";
                                                    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtfname']))) {
                                                        $err_fname = "Invalid data";
                                                    } else {
                                                        $err_fname = '';
                                                    }
                                                }
                                                echo $err_fname;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name <span class="text-danger"></span></label>
                                            <input name="txtmname" class="form-control" type="text">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtmname'])) {
                                                        $err_mname = "Middle Name is required";
                                                    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtmname']))) {
                                                        $err_mname = "Invalid data";
                                                    } else {
                                                        $err_mname = '';
                                                    }
                                                }
                                                echo $err_mname;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name <span class="text-danger"></span></label>
                                            <input name="txtlname" class="form-control" type="text">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtlname'])) {
                                                        $err_lname = "Last Name is required";
                                                    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtlname']))) {
                                                        $err_lname = "Invalid data";
                                                    } else {
                                                        $err_lname = '';
                                                    }
                                                }
                                                echo $err_lname;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Contact Number </label>
                                            <input name="txtcontact" class="form-control" type="text">
                                            <p><font color="red">
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
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger"></span></label>
                                            <input name="txtemail" class="form-control" type="email">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtemail'])) {
                                                        $err_email = "Email is required";
                                                    } else if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL)) {
                                                        $err_email = "Email format not valid";
                                                    } else {
                                                        $err_email = '';
                                                    }
                                                }
                                                echo $err_email;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group gender-select">
                                            <label class="gen-label">Gender:</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtgender" class="form-check-input" value=0>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtgender" class="form-check-input" value=1>Female
                                                </label>
                                            </div>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (!isset($_POST['txtgender'])) {
                                                        $err_gender = "Gender is required";
                                                    } else {
                                                        $err_gender = '';
                                                    }
                                                }
                                                echo $err_gender;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>

                                            <input name="txtaddress" type="text" class="form-control ">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtaddress'])) {
                                                        $err_address = "Address is required";
                                                    } else if ((!preg_match("/^[a-zA-z0-9, ]+$/", $_POST['txtaddress']))) {
                                                        $err_address = "Address is not valid";
                                                    } else {
                                                        $err_address = '';
                                                    }
                                                }
                                                echo $err_address;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div>
                                                <input name="txtdob" type="date" class="form-control">
                                            </div>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    $bday = new DateTime($_POST['txtdob']);
                                                    $today = new DateTime(date('m.d.y'));
                                                    $diff = $today->diff($bday);
                                                    if (empty($_POST['txtdob'])) {
                                                        $err_dob = "Date of Birth is required";
                                                    } else if ($_POST['txtdob'] > date("Y-m-d")) {
                                                        $err_dob = "Date of Birth cannot be greater than current date";
                                                    }  else {
                                                        $err_dob = '';
                                                    }
                                                }
                                                echo $err_dob;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Age <span class="text-danger"></span></label>
                                            <input name="txtage" class="form-control" type="text" value=<?php
                                            if (!empty($_POST['txtdob'])) {
                                                echo $diff->y;
                                            }
                                            ?> >
                                        </div>
                                    </div>-->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Registration Date</label>

                                            <input name="txtdoj" type="date" class="form-control ">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                                    if (empty($_POST['txtdoj'])) {
                                                        $err_doj = "Date of Joining is required";
                                                    } else {
                                                        $err_doj = '';
                                                    }
                                                }
                                                echo $err_doj;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group gender-select">
                                            <label class="gen-label">Marital Status:</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtmarital" value=0 class="form-check-input">Single
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtmarital" value=1 class="form-check-input">Married
                                                </label>
                                            </div>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (!isset($_POST['txtmarital'])) {
                                                        $err_marital = "Marital Status is required";
                                                    } else {
                                                        $err_marital = '';
                                                    }
                                                }
                                                echo $err_marital;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>

                                 
                                  

<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Password <span class="text-danger"></span></label>
                                            <input name="txtpass" class="form-control" type="password">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtpass'])) {
                                                        $err_pass = "Password is required";
                                                    } else if ((!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}/", $_POST['txtpass']))) {
                                                        $err_pass = "Password is not valid";
                                                    } else {
                                                        $err_pass = '';
                                                    }
                                                }
                                                echo $err_pass;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <input name="btnpatient" type="submit" value="Register Patient" class="btn btn-primary submit-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
        
        <?php 
            if (isset($_POST['btnpatient'])) {

            //echo "<script>alert('$staffID')</script>";
            if ($err_fname == "" && $err_mname == "" && $err_lname == "" && $err_contact == "" && $err_email == "" && $err_gender == "" && $err_address == "" && $err_marital == "" && $err_dob == "" && $err_doj == ""  && $err_pass=="") {
                //echo "<script>alert('button clicked')</script>";
                
                $fname = $_POST['txtfname'];
                $mname = $_POST['txtmname'];
                $lname = $_POST['txtlname'];
                $contact = $_POST['txtcontact'];
                $email = $_POST['txtemail'];
                $gender = $_POST['txtgender'];
                $address = $_POST['txtaddress'];
                $dob = $_POST['txtdob'];
                $doj = $_POST['txtdoj'];
                $marital = $_POST['txtmarital'];
               
                $password=$_POST['txtpass'];
                 //echo "<script>alert('$_POST[fileToUpload]')</script>";
                $exists=0;
                $sqry = $con->query("select contactNumber,email from patientMaster;");
                if ($sqry) {
                    if($sqry->num_rows>=1){
                    while ($row = $sqry->fetch_assoc()) {
                        if ($row['contactNumber'] == $contact) {
                            echo "<script>alert('contact number already exist')</script>";
                            $exists=1;
                        } 
                        if ($row['email'] == $email) {
                            echo "<script>alert('email already exist')</script>";
                             $exists=1;
                        } 
                        
                    }}
                }
                
                if($exists==0)
                {
                    
                            
                            $qry = $con->query("insert into patientMaster(firstName,middleName,lastName,contactNumber,email,gender,address,"
                                    . "dateOfBirth,registrationDate,marital,password) values('$fname','$mname','$lname','$contact','$email',"
                                    . "'$gender','$address','$dob','$doj','$marital','$password')");
                            //echo "<script>alert('$qry')</script>";

                            if ($qry == true) {
                                echo "<script>alert('Data Inserted')</script>";
                            } else {
                                echo "<script>alert('Data Not Inserted')</script>";
                            }
                }
            } else {

                echo "<script>alert('Form is not filled correctly')</script>";
            }
        }
        ?>
    </body>
</html>
