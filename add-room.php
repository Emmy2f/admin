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
    </head>
    <body><?php
        
        $err_rnum = "";
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Room</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" type="text" name="txtrnum">
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if(empty($_POST['txtrnum']))
                                                    {
                                                        $err_rnum="Room number is required";
                                                    }
                                                    else if ((!preg_match("/[0-9][0-9][0-9]/", $_POST['txtrnum']))) {
                                                        $err_rnum = "Invalid Room number";
                                                    } else {
                                                        $err_rnum = "";
                                                    }
                                                }
                                                echo $err_rnum;
                                                ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label>Floor</label>
                                <select class="form-control" name="txtfloor">
                                    <option value="Ground">Ground</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" name="txttype">
                                    <?php
                                    $fetch = $con->query("select * from roomType");
                                    if ($fetch) {

                                        while ($row = $fetch->fetch_assoc()) {
                                            $id = $row['roomTypeId'];
                                            echo "<option value=$id>" . $row['roomType'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Number of Beds</label>
                                <input class="form-control" type="text" name="txtbeds">
                            </div>
                            <div class="form-group">
                                <label>Cost Per Day</label>
                                <input class="form-control" type="text" name="txtcost">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" cols="30" name="txtdesc"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="btnaddroom">Add Room</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['btnaddroom'])) {
                            $roomnum = $_POST['txtrnum'];
                            $floor = $_POST['txtfloor'];
                            $rtype = $_POST['txttype'];
                            $beds = $_POST['txtbeds'];
                            $cost = $_POST['txtcost'];
                            $desc=$_POST['txtdesc'];

                            $qry = $con->query("insert into roomMaster(roomNumber,floor,roomTypeId,numberOfBeds,costPerDay,description)"
                                    . "values('$roomnum','$floor','$rtype','$beds','$cost','$desc')");
                                    
                            //echo "<script>alert('$qry')</script>";

                            if ($qry == true) {
                                echo "<script>alert('Data Inserted')</script>";
                            } else {
                                echo "<script>alert('Data Not Inserted')</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>
