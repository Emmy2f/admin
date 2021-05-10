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
        <?php
        $pId = $_POST['editid'];
        $qry = $con->query("select * from patientMaster where patientId=$pId;");
        while ($row = $qry->fetch_assoc()) {
            $fname = $row['firstName'];
            $mname = $row['middleName'];
            $lname = $row['lastName'];
            $contact = $row['contactNumber'];
            $email = $row['email'];
            $gender = $row['gender'];
            $address = $row['address'];
            $dob = $row['dateOfBirth'];
            $doj = $row['registrationDate'];
            $marital = $row['marital'];
           
        }
        ?>
    </head>
    <body>
         <div class="main-wrapper">


            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h4 class="page-title">Edit Patient</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form method="post" action="editpatientcode.php">
                                <input type="hidden" name='id' value='<?php echo $pId; ?>'>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="txtfname" id="fname" class="form-control" type="text" value="<?php echo $fname ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name <span class="text-danger"></span></label>
                                            <input name="txtmname" class="form-control" type="text" value="<?php echo $mname ?>">
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name <span class="text-danger"></span></label>
                                            <input name="txtlname" class="form-control" type="text" value="<?php echo $lname ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Contact Number </label>
                                            <input name="txtcontact" class="form-control" type="text" value="<?php echo $contact ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger"></span></label>
                                            <input name="txtemail" class="form-control" type="email" value="<?php echo $email ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group gender-select">
                                            <label class="gen-label">Gender:</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtgender" class="form-check-input" value=0 <?php
                                                if ($gender == 0) {
                                                    echo 'checked';
                                                }
                                                ?>>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtgender" class="form-check-input" value=1 <?php
                                                if ($gender == 1) {
                                                    echo 'checked';
                                                }
                                                ?>>Female
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>

                                            <input name="txtaddress" type="text" class="form-control " value="<?php echo $address ?>">
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div>
                                                <input name="txtdob" type="date" class="form-control" value="<?php echo $dob ?>">
                                            </div>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Registration Date</label>

                                            <input name="txtdoj" type="date" class="form-control " value="<?php echo $doj ?>">
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group gender-select">
                                            <label class="gen-label">Marital Status:</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtmarital" value=0 class="form-check-input" <?php
                                                if ($marital == 0) {
                                                    echo 'checked';
                                                }
                                                ?>>Single
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="txtmarital" value=1 class="form-check-input" <?php
                                                if ($marital == 1) {
                                                    echo 'checked';
                                                }
                                                ?>>Married
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>

                                 
                                  

<div class="col-sm-4">
                                       
                                    </div>
                                </div>

                                <div class="m-t-20 text-center">
                                    <input name="btnpatient" type="submit" value="Update Patient" class="btn btn-primary submit-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </body>
</html>
