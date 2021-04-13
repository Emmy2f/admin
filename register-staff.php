<!DOCTYPE html>
<html lang="en">


    <!-- add-patient24:06-->
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'styles.php'; ?>
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        ?>

    </head>

    <body>
        <?php
        doDBConnect();
        $err_fname = $err_mname = $err_lname = $err_contact = $err_email = "";
        ?>
        <div class="main-wrapper">


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
                                            <input name="txtfname" id="fname" class="form-control" type="text">
                                            <p><font color="red">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtfname']))) {
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
                                                    if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtmname']))) {
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
                                                    if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtlname']))) {
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
                                                    if ((!preg_match("/^[0-9]{10}+$/", $_POST['txtcontact']))) {
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
                                                    if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL)) {
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
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>

                                            <input name="txtaddress" type="text" class="form-control ">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div>
                                                <input name="txtdob" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Age <span class="text-danger"></span></label>
                                            <input name="txtage" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Joining</label>
                                            
                                                <input name="txtdoj" type="date" class="form-control datetimepicker">
                                            
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
                <div class="content table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Staff ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th>Date of Joining</th>
                            <th>Marital Status</th>
                        </tr>
                        <?php
                        $sqry = $con->query("select * from staffMaster;");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['staffID'] . "</td>"
                                . "<td>" . $row['staffFName'] . "</td>"
                                . "<td>" . $row['staffMName'] . "</td>"
                                . "<td>" . $row['staffLName'] . "</td>"
                                . "<td>" . $row['contactNumber'] . "</td>"
                                . "<td>" . $row['email'] . "</td>"
                                . "<td>" . $row['gender'] . "</td>"
                                . "<td>" . $row['address'] . "</td>"
                                . "<td>" . $row['dateOfBirth'] . "</td>"
                                . "<td>" . $row['dateOfJoining'] . "</td>"
                                . "<td>" . $row['maritalStatues'] . "</td>"
                                . "</tr>";
                            }
                            echo "</table>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['btnregstaff'])) {
            //echo "<script>alert('button clicked')</script>";
            $fname = $_POST['txtfname'];
            $mname = $_POST['txtmname'];
            $lname = $_POST['txtlname'];
            $contact = $_POST['txtcontact'];
            $email = $_POST['txtemail'];
            $gender = $_POST['txtgender'];
            $address = $_POST['txtaddress'];
            $dob =  $_POST['txtdob'];
            $doj = $_POST['txtdoj'] ;
            $marital = $_POST['txtmarital'];
            echo "<script>alert('$dob $doj')</script>";

            global $con;
            $qry = $con->query("insert into staffMaster(staffFName,staffMName,staffLName,contactNumber,email,gender,address,"
                    . "dateOfBirth,dateOfJoining,maritalStatues) values('$fname','$mname','$lname','$contact','$email',"
                    . "'$gender','$address','$dob','$doj','$marital')");
            //echo "<script>alert('$qry')</script>";

            if ($qry == true) {
                echo "<script>alert('Data Inserted')</script>";
            } else {
                echo "<script>alert('Data Not Inserted')</script>";
            }
        }
        ?>


    </body>



</html>
