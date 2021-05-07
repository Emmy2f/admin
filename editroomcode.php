<?php

if (isset($_POST['btnsave'])) {
    include_once 'commonMethods.php';
    doDBConnect();
    $err_rnum = $err_floor = $err_type = $err_beds = $err_cost = $err_description = "";
    
    $floor = $_POST['txtfloor'];
    $rtype = $_POST['txttype'];
    $beds = $_POST['txtbeds'];
    $cost = $_POST['txtcost'];
    
    $id = $_POST['id'];

    if (empty($_POST['txtrnum'])) {
        $err_rnum = "Room number is required";
    } else if ((!preg_match("/[0-9][0-9][0-9]/", $_POST['txtrnum']))) {
        $err_rnum = "Invalid Room number";
    } else {
        $err_rnum = "";
    }


    if ($_POST['txtfloor'] == "select") {
        $err_floor = "Floor is required";
    } else {
        $err_floor = "";
    }

    if ($_POST['txttype'] == "select") {
        $err_type = "Room Type is required";
    } else {
        $err_type = "";
    }

    if (empty($_POST['txtbeds'])) {
        $err_beds = "Number of Beds is required";
    } else if ((!preg_match("/[0-9]{1,2}/", $_POST['txtbeds']))) {
        $err_beds = "Invalid Beds number";
    } else if ($_POST['txtbeds'] > 12 || $_POST['txtbeds'] < 0) {
        $err_beds = "Beds should be less than 12 and greater than 0";
    } else {
        $err_beds = "";
    }

    if (empty($_POST['txtcost'])) {
        $err_cost = "Cost is required";
    } else if ((!preg_match("/[0-9]+/", $_POST['txtcost']))) {
        $err_cost = "Invalid Cost";
    } else if ($_POST['txtcost'] > 100000 || $_POST['txtcost'] < 0) {
        $err_cost = "Cost should be between 0 to 100000";
    } else {
        $err_cost = "";
    }

    if (empty($_POST['txtdesc'])) {
        $err_description = "Description is required";
    } else if ((!preg_match("/[A-Za-z ]+/", $_POST['txtdesc']))) {
        $err_description = "Invalid Description";
    } else {
        $err_description = "";
    }

    if ($err_rnum == "" && $err_floor == "" && $err_type == "" && $err_beds == "" && $err_cost == "" && $err_description == "")
    {
        $stmt=$con->prepare("update roomMaster "
                 . "set"
                 . " floor=?"
                 . ",roomTypeId=?"
                 . ",numberOfBeds=?"
                 
                 . ",costPerDay=?"
                 . ",description=? where roomNumber=?"
                 . "");
         $stmt->bind_param("iiissi",$bfloor,$btype,$bbeds,$bcost,$bdesc,$bid);
        $bfloor=$floor;
        $btype=$rtype;
        $bbeds=$beds;
        $bcost=$cost;
        $bdesc=$desc;
         $bid=$id;

        if ($stmt->execute() == true) {
            echo "<script>alert('Data Updated')</script>";
            header("Location:rooms.php");
        } else {
            echo "<script>alert('$err_dname $err_head $err_contact $err_description')</script>";
       }
    }
}
