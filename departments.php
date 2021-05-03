<?php session_start() ;
    if(!isset($_SESSION['admin']))
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
        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
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
                        <h4 class="page-title">Departments</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="add-department.php" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Department</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        
                                        <th>Department Name</th>
                                        <th>Department Head</th>
                                        <th>Contact Number</th>
                                        <th>Description</th>
                                        <th class="text-right" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                    $sqry = $con->query("select * from departmentMaster;");
                        if ($sqry) {
                           

                            while ($row = $sqry->fetch_assoc()) {
                                 $qry=$con->query("select * from doctorMaster where doctorId=$row[deptHead]");
                                 while ($row2 = $qry->fetch_assoc())
                                 {
                                     $fname=$row2['firstName'];
                                     $lname=$row2['lastName'];

                                 }
                                echo "<tr><td>" . $row['deptName'] . "</td>"
                                . "<td>" . $fname." " .$lname. "</td>"
                                . "<td>" . $row['deptContact'] . "</td>"
                                . "<td>" . $row['deptDesc'] . "</td>"
                                
                                ."<td>
                                            
                                    <form action='#' method='post'><input type='hidden' name='staffid' value='$row[deptId]'><input type='submit' name='edit' value='Edit'></form>
                                    
                                               
                                        </td>"
                                  ."<td>
                                            
                                    
                                    <form action='#' method='post'><input type='hidden' name='staffID' value='$row[deptId]'><input type='submit' name='edit' value='Delete'></form>
                                               
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
		<div id="delete_department" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Department?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    </body>
</html>
