
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
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        doDBConnect();
        
        ?>
        <?php
        include_once 'editstaff.php';
        
        
        ?>
      
    </head>
    <body>

        
         <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h4 class="page-title">Register Staff</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form method="post">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="txtfname" id="fname" class="form-control" type="text" value="<?php echo $fname ?>">
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
                                            <input name="txtmname" class="form-control" type="text" value="<?php echo $mname ?>">
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
                                            <input name="txtlname" class="form-control" type="text" value="<?php echo $lname ?>">
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
                                            <input name="txtcontact" class="form-control" type="text" value="<?php echo $contact ?>">
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
                                            <input name="txtemail" class="form-control" type="email" value="<?php echo $email ?>">
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

                                            <input name="txtaddress" type="text" class="form-control " value="<?php echo $address ?>">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtaddress'])) {
                                                        $err_address = "Address is required";
                                                    } else if ((!preg_match("/^[a-zA-z0-9 ]+$/", $_POST['txtaddress']))) {
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
                                                <input name="txtdob" type="date" class="form-control" value="<?php echo $dob ?>">
                                            </div>
                                            <p><font color="red">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bday=new DateTime($_POST['txtdob']);
    $today=new DateTime(date('m.d.y'));
    $diff=$today->diff($bday);
    if (empty($_POST['txtdob'])) {
        $err_dob = "Date of Birth is required";
    } 
    else if($_POST['txtdob']>date("Y-m-d")){
        $err_dob="Date of Birth cannot be greater than current date";
    }
     
    else if(($diff->y)<18)
    {
        $err_dob="Age should be atleast 18 years";
    }
    else {
        $err_dob = '';
    }
}
echo $err_dob;
?>
                                                </font></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Joining</label>

                                            <input name="txtdoj" type="date" class="form-control datetimepicker" value="<?php echo $doj ?>">
<p><font color="red">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['txtdoj'])) {
        $err_doj = "Date of Joining is required";
    } 
    
     
    
    else {
        $err_doj = '';
    }
}
echo $err_dob;
?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
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




                                </div>

                                <div class="m-t-20 text-center">
                                    <input name="btnregstaff" type="submit" value="Register Staff" class="btn btn-primary submit-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              
            </div>
        </body>
</html>

