<?php

if (isset($_POST['btndoc'])) {
    include_once 'commonMethods.php';
    doDBConnect();
    $err_fname = $err_mname = $err_lname = $err_reg = $err_contact = $err_email = $err_gender = $err_address = $err_marital = $err_dob = $err_doj = $err_spec = $err_quali = $err_img = $err_pass = "";
    $fname = $_POST['txtfname'];
    $mname = $_POST['txtmname'];
    $lname = $_POST['txtlname'];
    $regno = $_POST['txtrnum'];
    $contact = $_POST['txtcontact'];
    $email = $_POST['txtemail'];
    $gender = $_POST['txtgender'];
    $address = $_POST['txtaddress'];
    $dob = $_POST['txtdob'];
    $doj = $_POST['txtdoj'];
    $marital = $_POST['txtmarital'];
    $quali = $_POST['txtquali'];
    $spec = $_POST['txtspec'];

    $id = $_POST['id'];

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

    if (empty($_POST['txtrnum'])) {
        $err_reg = "Registration Number is required";
    } else if ((!preg_match("/[0-9][0-9][0-9][0-9]$/", $_POST['txtrnum']))) {
        $err_reg = "Invalid data";
    } else {
        $err_reg = '';
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

    if (empty($_POST['txtaddress'])) {
        $err_address = "Address is required";
    } else if ((!preg_match("/^[a-zA-z0-9, ]+$/", $_POST['txtaddress']))) {
        $err_address = "Address is not valid";
    } else {
        $err_address = '';
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

    if ($_POST['txtquali'] == "select") {
        $err_quali = "Qualification is required";
    } else {
        $err_quali = "";
    }


    if ($_POST['txtspec'] == "select") {
        $err_spec = "Specialization is required";
    } else {
        $err_spec = "";
    }

    if ($err_fname == "" && $err_mname == "" && $err_lname == "" && $err_reg == "" && $err_contact == "" && $err_email == "" && $err_gender == "" && $err_address == "" && $err_marital == "" && $err_dob == "" && $err_doj == "" && $err_spec == "" && $err_quali == "") {
        //echo "<script>alert('button clicked')</script>";
//        $fname = $_POST['txtfname'];
//        $mname = $_POST['txtmname'];
//        $lname = $_POST['txtlname'];
//        $regno = $_POST['txtrnum'];
//        $contact = $_POST['txtcontact'];
//        $email = $_POST['txtemail'];
//        $gender = $_POST['txtgender'];
//        $dob = $_POST['txtdob'];
//        
//        $address = $_POST['txtaddress'];
//        $doj = $_POST['txtdoj'];
//        $marital = $_POST['txtmarital'];
//        $quali = $_POST['txtquali'];
//        $spec = $_POST['txtspec'];
        
         $stmt=$con->prepare("update doctorMaster "
                 . "set"
                 . " firstName=?"
                 . ",middleName=?"
                 . ",lastName=?"
                 . ",registrationNumber=?"
                 . ",contactNumber=?"
                 . ",email=?"
                 . ",gender=?"
                 . ",dateOfBirth=?"
                 . ",address=?"
                 . ",dateOfJoining=?"
                 . ",marital=?"
                 . ",qualificationID=?"
                 . ",specializationID=? where doctorId=?"
                 . "");
         $stmt->bind_param("ssssssisssiiii",$bfname,$bmname,$blname,$bregno,$bcontact,$bemail,$bgender,$bdob,$baddress,$bdoj,$bmarital,$bqid,$bsid,$bid);
         $bfname=$fname;
         $bmname=$mname;
         $blname=$lname;
         $bregno=$regno;
         $bcontact=$contact;
         $bemail=$email;
         $bgender=$gender;
         $bdob=$dob;
         $bdoj=$doj;
         $baddress=$address;
         $bmarital=$marital;
         $bqid=$quali;
         $bsid=$spec;
         $bid=$id;
         

        if ($stmt->execute() == true) {
            echo "<script>alert('Data Updated')</script>";
            header("Location:doctor.php");
        } else {
            echo "<script>alert('Data Not Updated')</script>";
       }
        
//         $s = "update doctorMaster set "
//            . " firstName='$fname'"
//                 . ",middleName='$mname'"
//                 . ",lastName='$lname'"
//                 . ",registrationNumber='$regno'"
//                 . ",contactNumber='$contact'"
//                 . ",email='$email'"
//                 . ",gender='$gender'"
//                 . ",dateOfBirth='$dob'"
//                 . ",address='$address'"
//                 . ",dateOfJoining='$doj'"
//                 . ",marital='$marital'"
//                 . ",qualificationID='$quali'"
//                 . ",specializationID='$spec'"
//           
//            . " where doctorId='$id'";
//    $qry = $con->query($s);
//
//    if ($qry == true) {
//        echo "<script>alert('Data Updated')</script>";
//        header("Location:doctor.php");
//    } else {
//        echo "<script>alert('Data Not Updated')</script>";
//        
//    }
    } else {

        echo "<script>alert('$err_fname $err_mname $err_lname $err_contact $err_email $err_gender $err_address $err_dob $err_doj $err_marital $err_reg $err_spec $err_quali ')</script>";
    }

}