<?php

if (isset($_POST['btnsub'])) {
    include_once 'commonMethods.php';
    doDBConnect();
    $err_dname = $err_head = $err_contact = $err_description = "";
    $dname = $_POST['txtdname'];
    $head = $_POST['txthead'];
    $contact = $_POST['txtcontact'];
    $desc = $_POST['txtdesc'];
    $id = $_POST['id'];

    if (empty($_POST['txtdname'])) {
        $err_dname = "Department is required";
    } else if ((!preg_match("/[A-Za-z ]+/", $_POST['txtdname']))) {
        $err_dname = "Invalid Department Name";
    } else {
        $err_dname = "";
    }

    if ($_POST['txthead'] == "select") {
        $err_head = "Department Head is required";
    } else {
        $err_head = "";
    }

    if (empty($_POST['txtdesc'])) {
        $err_description = "Description is required";
    } else if ((!preg_match("/[A-Za-z ]+/", $_POST['txtdesc']))) {
        $err_description = "Invalid Description";
    } else {
        $err_description = "";
    }


    if (empty($_POST['txtcontact'])) {
        $err_contact = "Contact Number  is required";
    } else if ((!preg_match("/[0-9]{10}/", $_POST['txtcontact']))) {
        $err_contact = "Contact Number must be of 10 digits";
    } else {
        $err_contact = '';
    }

    if ($err_dname == "" && $err_head == "" && $err_contact == "" && $err_description == "")
    {
        $stmt=$con->prepare("update departmentMaster "
                 . "set"
                 . " deptName=?"
                 . ",deptHead=?"
                 . ",deptContact=?"
                 
                 
                 . ",deptDesc=? where deptId=?"
                 . "");
         $stmt->bind_param("sissi",$bdname,$bhead,$bcontact,$bdesc,$bid);
         $bdname=$dname;
         $bhead=$head;
         $bcontact=$contact;
         $bdesc=$desc;
         $bid=$id;

        if ($stmt->execute() == true) {
            echo "<script>alert('Data Updated')</script>";
            header("Location:departments.php");
        } else {
            echo "<script>alert('Data Not Updated')</script>";
       }
       
       }
        else {
            echo "<script>alert('$err_dname $err_head $err_contact $err_description')</script>";
        
    }
}