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
        $staffId = $_POST['editid'];
        $qry = $con->query("select * from doctorMaster where doctorId=$staffId;");
        while ($row = $qry->fetch_assoc()) {
            $fname = $row['staffFName'];
            $mname = $row['staffMName'];
            $lname = $row['staffLName'];
            $contact = $row['contactNumber'];
            $email = $row['email'];
            $gender = $row['gender'];
            $address = $row['address'];
            $dob = $row['dateOfBirth'];
            $doj = $row['dateOfJoining'];
            $marital = $row['maritalStatues'];
            $stype = $row['staffTypeId'];
            $img = $row['staffImage'];
        }
        ?>
    </head>
     <body>
        <?php
        doDBConnect();
        $err_fname = $err_mname = $err_lname = $err_reg = $err_contact = $err_email = $err_gender = $err_address = $err_marital = $err_dob = $err_doj = $err_spec = $err_quali = $err_img=$err_pass="";
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
                                            <label>Registration Number<span class="text-danger"></span></label>
                                            <input name="txtrnum" class="form-control" type="text">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if (empty($_POST['txtrnum'])) {
                                                        $err_reg = "Registration Number is required";
                                                    } else if ((!preg_match("/[0-9][0-9][0-9][0-9]$/", $_POST['txtrnum']))) {
                                                        $err_reg = "Invalid data";
                                                    } else {
                                                        $err_reg = '';
                                                    }
                                                }
                                                echo $err_reg;
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
                                                    } else if (($diff->y) < 18) {
                                                        $err_dob = "Age should be atleast 18 years";
                                                    } else {
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
                                            <label>Date of Joining</label>

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
                                                echo $err_dob;
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
                                            <label>Select Qualification<span class="text-danger"></span></label>
                                            <br>
                                            <select class="form-control" name="txtquali">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from qualificationMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['qualificationId'];
                                                        echo "<option value=$id>" . $row['name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if ($_POST['txtquali'] == "select") {
                                                        $err_quali = "Qualification is required";
                                                    } else {
                                                        $err_quali = "";
                                                    }
                                                }
                                                echo $err_quali;
                                                ?>
                                                </font></p>
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
                                                        echo "<option value=$id>" . $row['specializationName'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if ($_POST['txtspec'] == "select") {
                                                        $err_spec = "Specialization is required";
                                                    } else {
                                                        $err_spec = "";
                                                    }
                                                }
                                                echo $err_spec;
                                                ?>
                                                </font></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Upload Photo</label>
                                            <div class="profile-upload">
                                                <div class="upload-img">
                                                    <img alt="" src="assets/img/user.jpg">
                                                </div>
                                                <div class="upload-input">
                                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                                </div>
                                            </div>
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    $target_dir = "doctor/";
                                                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                                    $uploadOk = 1;
                                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                                    // Check if image file is a actual image or fake image
                                                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                    if ($check !== false) {

                                                        $uploadOk = 1;
                                                    } else {
                                                        echo "File is not an image.";
                                                        $uploadOk = 0;
                                                    }

                                                    // Check if file already exists
                                                    if (file_exists($target_file)) {
                                                        echo "Sorry, file already exists.";
                                                        $uploadOk = 0;
                                                    }

                                                    // Check file size
                                                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                                                        echo "Sorry, your file is too large.";
                                                        $uploadOk = 0;
                                                    }

// Allow certain file formats
                                                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                        $uploadOk = 0;
                                                    }

// Check if $uploadOk is set to 0 by an error
                                                    if ($uploadOk == 0) {
                                                        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                                                    } else {
                                                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                            $err_img="";
                                                            //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                                                        } else {
                                                            $err_img="error";
                                                            echo "Sorry, there was an error uploading your file.";
                                                        }
                                                }}
                                                    ?>
                                                    </font></p>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="m-t-20 text-center">
                                        <input name="btnregdoc" type="submit" value="Register Doctor" class="btn btn-primary submit-btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
              if (isset($_POST['btnregdoc'])) {
                  if(        $err_fname =="" && $err_mname =="" && $err_lname =="" && $err_reg =="" && $err_contact =="" && $err_email =="" && $err_gender =="" && $err_address =="" && $err_marital =="" && $err_dob =="" && $err_doj =="" && $err_spec =="" && $err_quali =="" && $err_img=="" && $err_pass=="")
                  {
              //echo "<script>alert('button clicked')</script>";
              $fname = $_POST['txtfname'];
              $mname = $_POST['txtmname'];
              $lname = $_POST['txtlname'];
              $regno=$_POST['txtrnum'];
              $contact = $_POST['txtcontact'];
              $email = $_POST['txtemail'];
              $gender = $_POST['txtgender'];
              $dob = $_POST['txtdob'] ;
              $password=$_POST['txtpass'];
              $address = $_POST['txtaddress'];
              $doj = $_POST['txtdoj'] ;
              $marital = $_POST['txtmarital'];
              $quali=$_POST['txtquali'];
              $spec=$_POST['txtspec'];
              $img=$target_file;

              global $con;
              $qry = $con->query("insert into doctorMaster(firstName,middleName,lastName,registrationNumber,contactNumber,email,gender,"
              . "dateOfBirth,password,address,dateOfJoining,marital,qualificationID,specializationID,uploadedImage) values('$fname','$mname','$lname','$regno','$contact','$email',"
              . "'$gender','$dob','$password','$address','$doj','$marital','$quali','$spec','$img')");
              //echo "<script>alert('$qry')</script>";

              if ($qry == true) {
              echo "<script>alert('Data Inserted')</script>";
              } else {
              echo "<script>alert('Data Not Inserted')</script>";
                  }}
                  else {

        echo "<script>alert('Form is not filled correctly')</script>";
    }
              } 
            ?>


    </body>
</html>
