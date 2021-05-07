<?php

if (isset($_POST['btnstaff'])) {
    include_once 'commonMethods.php';
    doDBConnect();
    $err_fname = $err_mname = $err_lname = $err_contact = $err_email = $err_gender = $err_address = $err_marital = $err_dob = $err_doj = $err_stype = $err_pass = "";

    //echo "<script>alert('$staffID')</script>";

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
    $stype = $_POST['txtstype'];
    $password = $_POST['txtpass'];
    $id = $_POST['id'];
    //echo "<script>alert('$id $fname')</script>";
    if (empty($_POST['txtfname'])) {
        $err_fname = "First Name is required";
    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtfname']))) {
        $err_fname = "Invalid data";
    } else {
        $err_fname = '';
    }

    if (empty($_POST['txtmname'])) {
        $err_mname = "Middle Name is required";
    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtmname']))) {
        $err_mname = "Invalid data";
    } else {
        $err_mname = '';
    }

    if (empty($_POST['txtlname'])) {
        $err_lname = "Last Name is required";
    } else if ((!preg_match("/^[a-zA-z]+$/", $_POST['txtlname']))) {
        $err_lname = "Invalid data";
    } else {
        $err_lname = '';
    }

    if (empty($_POST['txtcontact'])) {
        $err_contact = "Contact Number  is required";
    } else if ((!preg_match("/^[0-9]{10}+$/", $_POST['txtcontact']))) {
        $err_contact = "Contact Number must be of 10 digits";
    } else {
        $err_contact = '';
    }

    if (empty($_POST['txtemail'])) {
        $err_email = "Email is required";
    } else if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL)) {
        $err_email = "Email format not valid";
    } else {
        $err_email = '';
    }

    if (!isset($_POST['txtgender'])) {
        $err_gender = "Gender is required";
    } else {
        $err_gender = '';
    }

    if (empty($_POST['txtaddress'])) {
        $err_address = "Address is required";
    } else if ((!preg_match("/^[a-zA-z0-9 ]+$/", $_POST['txtaddress']))) {
        $err_address = "Address is not valid";
    } else {
        $err_address = '';
    }

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


    if (empty($_POST['txtdoj'])) {
        $err_doj = "Date of Joining is required";
    } else {
        $err_doj = '';
    }

    if (!isset($_POST['txtmarital'])) {
        $err_marital = "Marital Status is required";
    } else {
        $err_marital = '';
    }



    if ($_POST['txtstype'] == "select") {
        $err_stype = "Staff Type is required";
    } else {
        $err_stype = "";
    }
    
    if (empty($_POST['txtpass'])) {
        $err_pass = "Password is required";
    } else if ((!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}/", $_POST['txtpass']))) {
        $err_pass = "Password is not valid";
    } else {
        $err_pass = '';
    }
    
   if ($err_fname == "" && $err_mname == "" && $err_lname == "" && $err_contact == "" && $err_email == "" && $err_gender == "" && $err_address == "" && $err_marital == "" && $err_dob == "" && $err_doj == "" && $err_stype == "" && $err_img == "" && $err_pass=="") {


    $s = "update staffMaster set "
            . "staffFName='$fname', "
            . "staffMName='$mname',"
            . " staffLName='$lname',"
            . "contactNumber='$contact',"
            . "email='$email',"
            . "gender='$gender',"
            . "address='$address',"
            . "dateOfBirth='$dob',"
            . "dateOfJoining='$doj',"
            . "maritalStatues='$marital',"
            . "staffTypeId='$stype',"
            . "password='$password'"
            . " where staffID='$id'";
    $qry = $con->query($s);

    if ($qry == true) {
        echo "<script>alert('Data Updated')</script>";
        header("Location:staff.php");
    } else {
        echo "<script>alert('Data Not Updated')</script>";
        
    }
   }
   else
   {
       echo "<script>alert('$err_fname $err_mname $err_lname $err_contact $err_email $err_gender $err_address $err_dob $err_doj $err_marital $err_stype $err_pass')</script>";
   
      
   }
    // echo "<script>alert('$dob $doj')</script>";




    /*  $stmt=$con->prepare("update staffMaster set"
      . "staffFName=?"
      . "staffMName=?"
      . "staffLName=?"
      . "contactNumber=?"
      . "email=?"
      . "gender=?"
      . "address=?"
      . "dateOfBirth=?"
      . "dateOfJoining=?"
      . "maritalStatues=?"
      . "staffTypeId=?"

      . "password=?"
      . "where staffID=?");
      $stmt->bind_param("sssssisssiisi",$bfname,$bmname,$blname,$bcontact,$bemail,$bgender,$baddress,$bdob,$bdoj,$bmarital,$bstype,$bpass,$id);
      $bfname=$_POST['txtfname'];
      $bmname=$_POST['txtmname'];
      $blname=$_POST['txtlname'];
      $bcontact=$_POST['txtcontact'];
      $bemail = $_POST['txtemail'];
      $bgender = $_POST['txtgender'];
      $baddress = $_POST['txtaddress'];
      $bdob = $_POST['txtdob'];
      $bdoj = $_POST['txtdoj'];
      $bmarital = $_POST['txtmarital'];
      $bstype = $_POST['txtstype'];

      $bpass=$_POST['txtpass'];
      $id=$_POST['id'];
      if ($stmt->execute() == true) {
      echo "<script>alert('Data Updated')</script>";
      header("Location:staff.php");
      } else {
      echo "<script>alert('Data Not Updated')</script>";
      }
     * /
     */
    //echo "<script>alert('$qry')</script>";
//                            if ($qry == true) {
//                                echo "<script>alert('Data Inserted')</script>";
//                            } else {
//                                echo "<script>alert('Data Not Inserted')</script>";
//                            }
}
?>