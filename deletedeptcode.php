<?php

  include_once 'commonMethods.php';
           doDBConnect();
           $id=$_POST['deptID'];
           $stmt=$con->prepare("delete from departmentMaster where deptId=?");
           $stmt->bind_param("i",$bid);
           $bid=$id;
          if ($stmt->execute() == true) {
              echo "<script>alert('Data Deleted')</script>";
              header("Location:departments.php");
              } else {
              echo "<script>alert('Data Not Deleted')</script>";
                  }
