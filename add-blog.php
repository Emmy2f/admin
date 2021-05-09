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
    </head>
    <body>
        <?php
        $err_title = $err_img = $err_category = $err_status = $err_description = "";
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
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Blog Title</label>
                                <input name='txttitle' class="form-control" type="text">
                                <span style="color:red">
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        if (empty($_POST['txttitle'])) {
                                            $err_title = "Title is required";
                                        } else if ((!preg_match("/[A-Za-z-, ]+/", $_POST['txttitle']))) {
                                            $err_title = "Invalid title";
                                        } else {
                                            $err_title = '';
                                        }
                                    }
                                    echo $err_title;
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Blog Images</label>
                                <div>
                                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                                    <small class="form-text text-muted">Max. file size: 500 KB. Allowed images: jpg, gif, png,jpeg .</small>
                                    <span style="color:red">
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            $target_dir = "blog/";
                                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                            // Check if image file is a actual image or fake image
                                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                            if ($check !== false) {

                                                $uploadOk = 1;
                                            } else {
                                                echo "File is not an image.";
                                                $uploadOk = 0;
                                            }

                                          

                                            // Check file size
                                            if ($_FILES["fileToUpload"]["size"] > 500000) {
                                                echo "Sorry, your file is too large.";
                                                $uploadOk = 0;
                                            }

// Allow certain file formats
                                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                $uploadOk = 0;
                                            }

// Check if $uploadOk is set to 0 by an error
                                            if ($uploadOk == 0) {
                                                echo "Sorry, your file was not uploaded.";
                                                $err_img = "error";
// if everything is ok, try to upload file
                                            } else {
                                                $err_img = "";
                                            }
                                        }
                                        ?>
                                    </span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Category</label>
                                        <select class="select" name='txtcategory'>
                                            <option value='select'>--Select--</option>

                                            <option value="general">General</option>
                                            <option value="health news">Health News</option>
                                            <option value="technology">Technology</option>
                                            <option value="surgery">Surgery</option>
                                            <option value="disease">Disease</option>

                                        </select>
                                        <span style="color:red">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                if ($_POST['txtcategory'] == "select") {
                                                    $err_category = "Category is required";
                                                } else {
                                                    $err_category = "";
                                                }
                                            }
                                            echo $err_category;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Blog Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="txtstatus" id="blog_active" value="1">
                                            <label class="form-check-label" for="blog_active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="txtstatus" id="blog_inactive" value="0">
                                            <label class="form-check-label" for="blog_inactive">
                                                Inactive
                                            </label>
                                        </div>
                                        <br>
                                        <span style="color:red">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                if (!isset($_POST['txtstatus'])) {
                                                    $err_status = "Status is required";
                                                } else {
                                                    $err_status = '';
                                                }
                                            }
                                            echo $err_status;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Blog Description</label>
                                <textarea name='txtdesc' cols="30" rows="6" class="form-control"></textarea>
                                <span style="color:red">
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        if (empty($_POST['txtdesc'])) {
                                            $err_description = "Description is required";
                                        } else if ((!preg_match("/[A-Za-z0-9, %]+/", $_POST['txtdesc']))) {
                                            $err_description = "Invalid Description";
                                        } else {
                                            $err_description = "";
                                        }
                                        echo $err_description;
                                    }
                                    ?>
                                </span>
                            </div>


                            <div class="m-t-20 text-center">
                                <button name='btnblog' class="btn btn-primary submit-btn">Publish Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['btnblog'])) {
            if ($err_title == "" && $err_img == "" && $err_category == "" && $err_status == "" && $err_description == "")
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {

                    echo "Sorry, there was an error uploading your file.";
                }
                $title=$_POST['txttitle'];
                $img=$target_file;
                $category=$_POST['txtcategory'];
                $status=$_POST['txtstatus'];
                $desc=$_POST['txtdesc'];
                
//                $stmt=$con->prepare("insert into blogMaster(blogTitle,blogImage,blogCategory,blogStatus,description)"
//                        . " values('?','?','?','?','?')");
//                $stmt->bind_param("sssis",$btitle,$bimg,$bcategory,$bstatus,$bdesc);
//                $btitle=$title;
//                $bimg=$img;
//                $bcategory=$category;
//                $bstatus=$status;
//                $bdesc=$desc;
//                
//                if($stmt->execute())
//                {
//                    echo "<script>alert('Data Inserted')</script>";
//                }
//                else
//                {
//                    echo "<script>alert('Data Not Inserted')</script>";
//                }
                
                $qry = $con->query("insert into blogMaster(blogTitle,blogImage,blogCategory,blogStatus,description)"
                                    . "values('$title','$img','$category',$status','$desc')");
                                    
                            //echo "<script>alert('$qry')</script>";

                            if ($qry == true) {
                                echo "<script>alert('Data Inserted')</script>";
                            } else {
                                echo "<script>alert('Data Not Inserted')</script>";
                            }
            }
            else {

                echo "<script>alert('Form is not filled correctly')</script>";
            }
        }
        ?>
    </body>
</html>
