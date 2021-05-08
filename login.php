<?php session_start();

include_once 'commonMethods.php';
doDBConnect();
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
    </head>
    <body>
        <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form  class="form-signin" method='post'>
						<div class="account-logo">
                            <img src="assets/img/logo-dark.png" alt="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" autofocus="" class="form-control" name='txtemail'>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name='txtpass'>
                        </div>
						
						<div class="form-group">
                            <label>Role</label>
                            <select name='txtrole' class="form-control">
                                            <option>-- Select --</option>
                                            <option value='admin'>Admin</option>
                                            <option value='receptionist'>Receptionist</option>
                                            <option>Doctor</option>
                                            
                                        </select>
                        </div>
						
                        <div class="form-group text-center">
                            <button type="submit" name='btnsub' class="btn btn-primary account-btn">Login</button>
                        </div>
                        
                    </form>
                </div>
			</div>
        </div>
    </div>
        <?php 
        if(isset($_POST['btnsub']))
        {
            $role=$_POST['txtrole'];
            $email=$_POST['txtemail'];
            $password=$_POST['txtpass'];
            if($role=='admin')
            {
                //echo "<script>alert('he')</script>";
                $stmt=$con->prepare("select * from adminMaster where email=? and password=? ");
                $stmt->bind_param("ss", $user, $pass);
                $user=$email;
                $pass=$password;
                $stmt->execute();
                $result = $stmt->get_result();
//while ($row = $result->fetch_assoc()) {
//    echo $row['custName'];
//}
               if($result->num_rows>0)
               {
                   echo "<script>alert('Login successful')</script>";
                   $_SESSION['admin']=$email;
                   header("Location:index.php");
               }
            }
            if($role=='receptionist')
            {
                //echo "<script>alert('he')</script>";
                $stmt=$con->prepare("select * from staffMaster where email=? and password=? and staffTypeId='1' ");
                $stmt->bind_param("ss", $user, $pass);
                $user=$email;
                $pass=$password;
                $stmt->execute();
                $result = $stmt->get_result();
//while ($row = $result->fetch_assoc()) {
//    echo $row['custName'];
//}
               if($result->num_rows>0)
               {
                   echo "<script>alert('Login successful')</script>";
                   $_SESSION['receptionist']=$email;
                   header("Location:rdashboard.php");
               }
            }
        }
        
        ?>
    </body>
</html>
