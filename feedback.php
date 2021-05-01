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
        <?php include_once 'commonMethods.php';
 doDBConnect();
        ?>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Feedback</h4>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Feedback ID </th>
                                        <th>Feedback Title</th>
                                        <th>Description</th>
                                        <th>Rating</th>
                                        <th>Date</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqry = $con->query("select * from feedbackMaster;");
                        if ($sqry) {

                            while ($row = $sqry->fetch_assoc()) {
                                echo "<tr><td>" . $row['feedbackId'] . "</td>"
                                . "<td>" . $row['title'] . "</td>"
                                . "<td>" . $row['description'] . "</td>"
                                . "<td>" . $row['rating'] . "</td>"
                                . "<td>" . $row['date'] . "</td>"
                                ."<td class='text-right'>
                                            <div class='dropdown dropdown-action'>
                                                <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-ellipsis-v'></i></a>
                                                <div class='dropdown-menu dropdown-menu-right'>
                                                    <a class='dropdown-item' href='edit-room.php'><i class='fa fa-pencil m-r-5'></i> Edit</a>
                                                    <a class=dropdown-item href='#' data-toggle='modal' data-target='#delete_department'><i class='fa fa-trash-o m-r-5'></i> Delete</a>
                                                </div>
                                            </div>
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
