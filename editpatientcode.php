<?php

if (isset($_POST['btnpatient'])) {
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
   
    
    $id = $_POST['id'];
    //echo "<script>alert('$id')</script>";
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
    } else if ((!preg_match("/^[a-zA-z0-9, ]+$/", $_POST['txtaddress']))) {
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
    }else {
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



   
    
   if ($err_fname == "" && $err_mname == "" && $err_lname == "" && $err_contact == "" && $err_email == "" && $err_gender == "" && $err_address == "" && $err_marital == "" && $err_dob == "" && $err_doj == "" ) {


    $s = "update patientMaster set "
            . "firstName='$fname', "
            . "middleName='$mname',"
            . "lastName='$lname',"
            . "contactNumber='$contact',"
            . "email='$email',"
            . "gender='$gender',"
            . "address='$address',"
            . "dateOfBirth='$dob',"
            . "registrationDate='$doj',"
            . "marital='$marital'"
           
           
            . " where patientId='$id'";
    $qry = $con->query($s);

    if ($qry == true) {
        echo "<script>alert('Data Updated')</script>";
        header("Location:patients.php");
    } else {
        echo "<script>alert('Data Not Updated')</script>";
        
    }
   }
   else
   {
       echo "<script>alert('$err_fname $err_mname $err_lname $err_contact $err_email $err_gender $err_address $err_dob $err_doj $err_marital $err_stype ')</script>";
   
      
   }
    // echo "<script>alert('$dob $doj')</script>";




   
}
?>