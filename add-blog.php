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
    </head>
    <body>
        <?php
            $err_title=$err_img=$err_category=$err_status=$err_desc="";
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Blog</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="form-group">
                                <label>Blog Title</label>
                                <input name='txttitle' class="form-control" type="text">
                                <span style="color:red">
                                    
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Blog Images</label>
                                <div>
                                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                                    <small class="form-text text-muted">Max. file size: 500 KB. Allowed images: jpg, gif, png,jpeg .</small>
                                     <span style="color:red">
                                         
                                </span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Category</label>
                                        <select class="select" name='txtcategory'>
                                            <option>--Select--</option>

                                            <option>General Blogs</option>
                                            <option>Health News Blog</option>
                                            <option>Technology Blog</option>
                                            <option>Surgery Blog</option>
                                            <option>Disease Blog</option>

                                        </select>
                                         <span style="color:red">
                                                
                                </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Blog Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="txtstatus" id="blog_active" value="option1" checked>
                                            <label class="form-check-label" for="blog_active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="txtstatus" id="blog_inactive" value="option2">
                                            <label class="form-check-label" for="blog_inactive">
                                                Inactive
                                            </label>
                                        </div>
                                        <br>
                                         <span style="color:red">

                                </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Blog Description</label>
                                <textarea name='txtdesc' cols="30" rows="6" class="form-control"></textarea>
                             <span style="color:red">

                                </span>
                            </div>


                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Publish Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
