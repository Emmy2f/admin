<?php session_start() ;
    if(!isset($_SESSION['admin']))
    {
        header("Location:index.php");
    }
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
    <body>
<?php 

$room=$_POST['roomnumber'];
//echo "<script>alert('$room')</script>";
 $qry = $con->query("select * from roomMaster where roomNumber=$room;");
while ($row = $qry->fetch_assoc()) {
            $beds=$row['numberOfBeds'];
            $floor=$row['floor'];
            $cost=$row['costPerDay'];
            $type=$row['roomTypeId'];
        }
        
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
                        <form method="post" action="edit-room.php">
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" name='txtrnum' type="text" value="<?php echo $room ?>"n disabled="true">
                            </div>

                            <div class="form-group">
                                <label>Floor</label>
                                <select class="form-control" name='txtfloor'>
                                    
                                    <option value="select" <?php 
                                        if($floor=="select")
                                        {
                                            echo "selected";
                                        }
                                    
                                     ?> > --Select--</option>
                                    <option value="Ground" <?php 
                                   if($floor=="Ground")
                                        {
                                            echo "selected";
                                        }
                                     ?> > Ground</option>
                                    
                                    <option value="1" <?php 
                                    if($floor=="1")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 1</option>
                                    
                                     <option value="2" <?php 
                                    if($floor=="2")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 2</option>
                                    
                                      <option value="3" <?php 
                                   if($floor=="3")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 3</option>
                                      
                                       <option value="4" <?php 
                                   if($floor=="4")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 4</option>
                                       
                                        <option value="5" <?php 
                                   if($floor=="5")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 5</option>
                                        
                                         <option value="6" <?php 
                                   if($floor=="6")
                                        {
                                            echo "selected";
                                        }
                                     ?> > 6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" name='txttype' >
                                    <option value="select">--Select--</option>
                                    <?php
                                    $fetch = $con->query("select * from roomType");
                                    if ($fetch) {

                                        while ($row = $fetch->fetch_assoc()) {
                                            $id = $row['roomTypeId'];
                                            if($id==$type){
                                                echo "<option value=$id selected>" . $row['roomType'] . "</option>";
                                            }
                                            else
                                            {
                                            echo "<option value=$id>" . $row['roomType'] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Number of Beds</label>
                                <input class="form-control" name='txtbeds' type="text" value="<?php echo $beds;?>">
                            </div>
                            <div class="form-group">
                                <label>Cost Per Day</label>
                                <input class="form-control" name='txtcost' type="text" value="<?php  echo $cost;?>">
                            </div>
                            <div class="m-t-20 text-center">
                                <button name="btnsave" class="btn btn-primary submit-btn">Save Room</button>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['btnsave']))
                            {
                                $rnum=$_POST['txtrnum'];
                                $floor=$_POST['txtfloor'];
                                $type=$_POST['txttype'];
                                $beds=$_POST['txtbeds'];
                                $cost=$_POST['txtcost'];
                                
                                $uqry=$con->query("UPDATE roomMaster SET 'floor'=$floor, 'roomTypeId'=$type, 'numberOfBeds'=$beds"
                                        . ",'costPerDay'=$cost where 'roomNumber'=$rnum");
                                if($uqry==true)
                                {
                                    echo "<script>alert('Data updated')</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Data not updated')</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>

