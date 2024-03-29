<?php session_start() ;
    if(!isset($_SESSION['admin']))
    {
        header("Location:login.php");
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
        <script>
            
        </script>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Rooms</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="add-room.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Room</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">Ground Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='Ground';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='deleteroomcode.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">1st Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='1';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">2nd Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='2';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">3rd Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='3';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">4th Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='4';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">5th Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='5';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">6th Floor</h4>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Room Number </th>
                                        <th>Room Type</th>
                                        <th>Number of Beds</th>
                                        <th>Cost Per Day</th>
                                        <th>Description</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from roomMaster where floor='6';");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['roomNumber'] . "</td>"
                                . "<td>" . $row['roomTypeId'] . "</td>"
                                . "<td>" . $row['numberOfBeds'] . "</td>"
                                . "<td>" . $row['costPerDay'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                 ."<td>
                                            
                                     <form action='edit-room.php' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='roomNumber' value='$row[roomNumber]'><input type='submit' name='edit' value='Delete'></form>
                                               
                                        </td>"          
                                . "</tr>";
                            }
                            
                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
               
            </div>

        </div>
    </body>
</html>
