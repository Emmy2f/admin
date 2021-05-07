<?php
session_start();
if (!isset($_SESSION['admin'])) {
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
<?php
        $docId = $_POST['editid'];
        $qry = $con->query("select * from doctorMaster where doctorId=$docId;");
        while ($row = $qry->fetch_assoc()) {
            $fname = $row['firstName'];
            $mname = $row['middleName'];
            $lname = $row['lastName'];
            $regno=$row['registrationNumber'];
            $contact = $row['contactNumber'];
            $email = $row['email'];
            $gender = $row['gender'];
            $address = $row['address'];
            $dob = $row['dateOfBirth'];
            $doj = $row['dateOfJoining'];
            $marital = $row['marital'];
           $qualId=$row['qualificationID'];
           $specId=$row['specializationID'];
        }
        ?>
    </head>
     <body>
        <?php
        doDBConnect();
        ?>
         
        <div class="main-wrapper">


            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h4 class="page-title">Edit Doctor</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form method="post" action='editdoctorcode.php' enctype="multipart/form-data">
                                 <input type="hidden" name='id' value='<?php echo $docId; ?>'>
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
                                            <label>Registration Number<span class="text-danger"></span></label>
                                            <input name="txtrnum" class="form-control" type="text" value="<?php echo $regno ?>">
                                            
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
                                                ?> >Male
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div>
                                                <input name="txtdob" type="date" class="form-control" value="<?php echo $dob ?>">
                                            </div>
                                            
                                        </div>
                                    </div>
                                 
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>

                                            <input name="txtaddress" type="text" class="form-control  " value="<?php echo $address ?>">
                                            
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Joining</label>

                                            <input name="txtdoj" type="date" class="form-control" value="<?php echo $doj ?>">
                                            
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
                                        <div class="form-group">
                                            <label>Select Qualification<span class="text-danger"></span></label>
                                            <br>
                                            <select class="form-control" name="txtquali">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from qualificationMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['qualificationId'];
                                                        if ($id == $qualId) {
                                                        echo "<option value=$id selected>" . $row['name'] . "</option>";
                                                    } else {
                                                        echo "<option value=$id>" . $row['name'] . "</option>";
                                                    }
                                                    }
                                                }
                                                ?>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Specialization<span class="text-danger"></span></label>
                                            <br>
                                            <select class="form-control" name="txtspec">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from specializationMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['specializationID'];
                                                         if ($id == $specId) {
                                                        echo "<option value=$id selected>" . $row['specializationName'] . "</option>";
                                                    } else {
                                                        echo "<option value=$id>" . $row['specializationName'] . "</option>";
                                                    }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                   

                                    </div>


                                    <div class="m-t-20 text-center">
                                        <input name="btndoc" type="submit" value="Update Doctor" class="btn btn-primary submit-btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
           


    </body>
</html>
