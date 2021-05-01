<?php session_start() ;
    if(!isset($_SESSION['admin']))
    {
        header("Location:index.php");
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
        <script>
            
           
         </script>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Staff</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="register-staff.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Register Staff</a>
                    </div>
                </div>
				<div class="row ">
                                     <?php
                                     $id="";
                                    $sqry = $con->query("select * from staffMaster s,staffTypeMaster st where s.staffTypeId=st.staffTypeId;");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                
                                echo "<div class='col-md-4 col-sm-4  col-lg-3'>
                        <div class='profile-widget'>
                            <div class='doctor-img'>
                                <a class='avatar' href='#'><img class='avatar' alt='' src=$row[staffImage]></a>
                            </div>
                            <div class='dropdown profile-action'>
                                <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-ellipsis-v'></i></a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <form method='post' action='edit-staff.php'><input type='hidden' value='$row[staffID]' name='editid'><a  class='dropdown-item' href='edit-staff.php' onclick=''><i class='fa fa-pencil m-r-5'></i><input type='submit' value='Edit'> </a></form>
                                    <a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_doctor'><i class='fa fa-trash-o m-r-5'></i> Delete</a>
                                </div>
                            </div>
                            <h4 class='doctor-name text-ellipsis'><a href='profile.html'>$row[staffFName] $row[staffLName]</a></h4>
                            <div class='doc-prof'> $row[staffType]</div>
                            
                        </div>
                    </div>";
                                
                            }
                            
                        }
                       
                                    ?>
                    
                    
                   
                </div>
				
            </div>
           <div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Doctor?</h3>
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
