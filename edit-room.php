<?php session_start();
?>
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
        global $con;
        $room = $_POST['roomnumber'];
        $floor = $con->query("select floor from roomMaster where roomNumber=$room;");
        $type = $con->query("select roomTypeId from roomMaster where roomNumber=$room;");
        
       // echo "<script>alert($type2)</script>";
        ?>

        <div class="page-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Room </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" type="text" value="<?php echo $room ?>">
                            </div>

                            <div class="form-group">
                                <label>Floor</label>
                                <select class="form-control" value="<?php while ($row = $floor->fetch_assoc()) {
            echo $row['floor'] ;
            
        } ?>">
                                    <option>select</option>
                                    <option>Ground</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" >
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Number of Beds</label>
                                <input class="form-control" type="text" value="<?php while ($row = $type->fetch_assoc()) {
            echo $row['roomTypeId'] ;
            
        } ?>">
                            </div>
                            <div class="form-group">
                                <label>Cost Per Day</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Save Room</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>

