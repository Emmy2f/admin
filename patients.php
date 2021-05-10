<?php session_start() ;
    if(!isset($_SESSION['receptionist']))
    {
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
        <?php include 'rheader.php'; ?>
        <?php include 'rsidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        doDBConnect();
        ?>
    </head>
    <body>
          <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Patient</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="register-patient.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Register Patient</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Staff ID </th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Date of Birth</th>
                                        <th>Registration Date</th>
                                        <th>Marital Status</th>
                                        
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    <?php
                                    $sqry = $con->query("select * from patientMaster;");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                if($row['gender']==0)
                                {
                                    $gender="Male";
                                }
                                else
                                {
                                    $gender="Female";
                                }
                                 if($row['marital']==0)
                                {
                                    $marital="Single";
                                }
                                else
                                {
                                    $marital="Married";
                                }
                                
                               
                                echo "<tr><td>" . $row['patientId'] . "</td>"
                                . "<td>" . $row['firstName'] . "</td>"
                                . "<td>" . $row['middleName'] . "</td>"
                                . "<td>" . $row['lastName'] . "</td>"
                                . "<td>" . $row['contactNumber'] . "</td>"
                                . "<td>" . $row['email'] . "</td>"
                                . "<td>" . $gender . "</td>"
                                . "<td>" . $row['address'] . "</td>"
                                . "<td>" . $row['dateOfBirth'] . "</td>"
                                . "<td>" . $row['registrationDate'] . "</td>"
                                . "<td>" . $marital . "</td>"
                               
                                ."<td>
                                            
                                    <form action='edit-patient.php' method='post'><input type='hidden' name='editid' value='$row[patientId]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='deletepatientcode.php' method='post'><input type='hidden' name='editid' value='$row[patientId]'><input type='submit' name='delete' value='Delete'></form>
                                               
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
                
            </div>

        </div>
    </body>
</html>
