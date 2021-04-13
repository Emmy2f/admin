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
        while ($row = $floor->fetch_assoc()) {
        echo "<script>".$row['floor']."</script>" ;}
        //echo "<script>alert($floor)</script>";
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
                                <select class="form-control" >
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="select")
                                        {
                                            $flag=true;
                                        }
                                        else
                                        {
                                            $flag=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="select" selected=<?php $flag ?> > select</option>
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="Ground")
                                        {
                                            $flagg=true;
                                        }
                                        else
                                        {
                                            $flagg=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="Ground" selected=<?php $flagg; ?> > Ground</option>
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="1")
                                        {
                                            $flag1=true;
                                        }
                                        else
                                        {
                                            $flag1=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="1" selected=<?php $flag1; ?>> 1</option>
                                    
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="2")
                                        {
                                            $flag2=true;
                                        }
                                        else
                                        {
                                            $flag2=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="2" selected=<?php $flag2; ?>> 2</option>
                                    
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="3")
                                        {
                                            $flag3=true;
                                        }
                                        else
                                        {
                                            $flag3=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="3" selected=<?php $flag3; ?>> 3</option>
                                    
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="4")
                                        {
                                            $flag4=true;
                                        }
                                        else
                                        {
                                            $flag4=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="4" selected=<?php $flag4; ?> > 4</option>
                                    
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="5")
                                        {
                                            $flag5=true;
                                        }
                                        else
                                        {
                                            $flag5=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="5" selected=<?php $flag5; ?> > 5</option>
                                    
                                    <?php 
                                    while ($row = $floor->fetch_assoc()) {
                                        if($row['floor'] =="6")
                                        {
                                            $flag6=true;
                                        }
                                        else
                                        {
                                            $flag6=false;
                                        };
            
                                     }
                                     ?> 
                                    <option value="6" selected=<?php $flag6; ?>> 6</option>
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

