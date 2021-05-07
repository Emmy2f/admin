<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:login.php");
}
?><!DOCTYPE html>
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
        <?php
        $deptId = $_POST['editid'];
        $qry = $con->query("select * from departmentMaster where deptId=$deptId;");
        while ($row = $qry->fetch_assoc()) {
            $dname = $row['deptName'];
            $head=$row['deptHead'];
            $contact=$row['deptContact'];
            $desc=$row['deptDesc'];
        }
        ?>
    </head>
    
    
     <body>
        <?php
        
        
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Department</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="editdeptcode.php">
                            <input type="hidden" name='id' value='<?php echo $deptId; ?>'>
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" name="txtdname" value='<?php echo $dname; ?>'>
                               
                            </div>
                            
                           
                            <div class="form-group">
                                <label>Department Head</label>
                                <select class="form-control" name="txthead">
                                                <option value="select">--Select--</option>
                                                <?php
                                                $fetch = $con->query("select * from doctorMaster");
                                                if ($fetch) {

                                                    while ($row = $fetch->fetch_assoc()) {
                                                        $id = $row['doctorId'];
                                                        //echo "<option value=$id>" . $row['firstName'] . " ".$row['lastName']. "</option>";
                                                        if ($id == $head) {
                                                        echo "<option value=$id selected>" . $row['firstName'] . " ".$row['lastName'] . "</option>";
                                                    } else {
                                                        echo "<option value=$id>" . $row['firstName'] . " ".$row['lastName'] . "</option>";
                                                    }
                                                    }
                                                }
                                                ?>
                                            </select>
                               
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input class="form-control" type="text" name="txtcontact" value='<?php echo $contact; ?>'>
                               
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="txtdesc" ><?php echo $desc; ?></textarea>
                                
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="btnsub">Update Department</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
    </body>
</html>
